<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function index()
    {
        return view('donate');
    }
    
    public function handleCallback(Request $request)
    {
        // Verify the transaction with Flutterwave
        $transactionId = $request->transaction_id;
        $status = $request->status;
        
        if ($status == 'successful') {
            // Verify with Flutterwave API
            $secretKey = env('FLUTTERWAVE_SECRET_KEY');
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$transactionId}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer {$secretKey}",
                    "Content-Type: application/json"
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            if ($err) {
                Log::error("Flutterwave API Error: " . $err);
                return redirect()->route('donate')->with('error', 'An error occurred while processing your donation. Please contact us for assistance.');
            }
            
            $transaction = json_decode($response);
            
            if ($transaction && $transaction->status == "success") {
                // Save donation to database
                Donation::create([
                    'transaction_id' => $transactionId,
                    'amount' => $transaction->data->amount,
                    'currency' => $transaction->data->currency,
                    'payment_method' => $transaction->data->payment_type,
                    'status' => 'completed',
                    'donor_email' => $transaction->data->customer->email ?? null,
                    'donor_name' => $transaction->data->customer->name ?? 'Anonymous',
                    'metadata' => json_encode($transaction->data->meta ?? []),
                ]);
                
                return redirect()->route('donation.thank-you')->with('transaction', $transaction->data);
            }
        }
        
        return redirect()->route('donate')->with('error', 'Your donation was not successful. Please try again or contact us for assistance.');
    }
    
    public function thankYou()
    {
        $transaction = session('transaction');
        return view('donation-thank-you', compact('transaction'));
    }
}