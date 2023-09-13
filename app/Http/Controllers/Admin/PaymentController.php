<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Transaction;
use Braintree\Gateway;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function token(Apartment $apartment, Sponsorship $sponsorship)
    {
        // Policy Filter
        if ($apartment->user_id != Auth::id()) {
            return redirect()->back()->withErrors('You don\'t have permission to access the requested page.');
        }
        if (!$apartment->visible) {
            return redirect()->route('admin.apartments.show', $apartment)->withErrors('You don\'t have permission to access the requested page. Your apartment must be visible to be sponsored.');
        }

        // Generates a payment token
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.payments.payment', [
            'token' => $clientToken,
            'sponsorship' => $sponsorship,
            'apartment' => $apartment
        ]);
    }

    public function process(Request $request)
    {
        // Retrieve data for transaction
        $nonce = $request->input('payment_method_nonce');
        $amount = $request->input('amount');
        $sponsorship = Sponsorship::where('id', $request->input('spons_id'))->where('price', $amount)->first();
        $startDate = $request->input('spons_date') . ' ' . Carbon::now()->format('H:i:s');
        $apartment = Apartment::findOrFail($request->input('apartment_id'));

        // Policy & Security Filter
        if (
            $apartment->user_id != Auth::id() ||
            !$sponsorship ||
            $sponsorship->price != $amount ||
            $startDate < Carbon::now() ||
            $startDate > Carbon::now()->addDays(95)
        ) {
            return redirect()->route('admin.apartments.index')->withErrors('Something went wrong while processing your sponsorship and the payment has not been made.');
        }

        // Try to make the transaction
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        try {
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
            ]);

            if ($result->success) {

                $sponsDays = $sponsorship->hours / 24;
                $endDate = Carbon::parse($startDate)->addDays($sponsDays)->format('Y-m-d H:i:s');

                // Save the sponsorship into the DataBase
                $apartment->sponsorships()->attach($sponsorship->id, [
                    'start_date' => $startDate,
                    'end_date' => $endDate
                ]);
                // dump('successsss: ', $result);
                // dump('payment method: ' . $nonce, '€' . $amount, $apartment, $sponsorship, $startDate, $endDate);

                return view('admin.payments.success', compact('apartment', 'sponsorship', 'startDate', 'endDate'));
            } else {
                // dd('fail: ', $result);
                return view('admin.payments.failed', compact('apartment', 'sponsorship'));
            }
        } catch (\Exception $e) {
            // return 'Payment error:' . $e->getMessage();
            return view('admin.payments.failed', compact('apartment', 'sponsorship'));
        }
    }
}
