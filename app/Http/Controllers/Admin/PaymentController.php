<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\Transaction;
use Braintree\Gateway;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function token(Request $request) {

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        if($request->input('nonce') != null){
            $nonceFromTheClient = $request->input('nonce');

            $gateway->transaction()->sale([
                'amount' => '10.00',
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            return view ('dashboard');
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view ('admin.payments.payment',['token' => $clientToken]);
        }

        // $clientToken = $gateway->clientToken()->generate();
        // return view('admin.payments.payment', ['token' => $clientToken]);
    }

    public function process(Request $request)
    {

        dd($request);
        $nonce = $request->payment_method_nonce;

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        try {
            $result = $gateway->transaction()->sale([
                'amount' => '10.00', // L'importo del pagamento
                'paymentMethodNonce' => $nonce,
            ]);

            if ($result->success) {
                // Pagamento avvenuto con successo
                return 'Pagamento avvenuto con successo!';
            } else {
                // Gestisci l'errore del pagamento
                return 'Errore durante il pagamento: ' . $result->message;
            }
        } catch (\Exception $e) {
            Log::error('Errore durante il pagamento: ' . $e->getMessage());
            return 'Errore durante il pagamento: ' . $e->getMessage();
        }

    }
}

