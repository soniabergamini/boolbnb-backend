<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Transaction;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function token(Apartment $apartment, Sponsorship $sponsorship)
    {
        // Policy Filter
        if($apartment->user_id != Auth::id()) {
            return redirect()->back()->withErrors('You don\'t have permission to access the requested page.');
        }

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
        $nonce = $request->input('payment_method_nonce');
        dump('payment method: ', $nonce);
        $amount = $request->input('amount');
        dump('amount: ', $amount);
        $apartment = $request->input('apartment_id');
        dump('apartment id: ', $apartment);

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
                dd('successsss: ', $result);
                return 'Pagamento avvenuto con successo!';
            } else {
                // Gestisci l'errore del pagamento
                dd('fail: ', $result);
                return 'Errore durante il pagamento: ' . $result->message;
            }
        } catch (\Exception $e) {
            Log::error('Errore durante il pagamento: ' . $e->getMessage());
            return 'Errore durante il pagamento: ' . $e->getMessage();
        }
    }
}
