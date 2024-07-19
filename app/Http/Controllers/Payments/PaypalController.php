<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Core\Websiteinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{

    public function paypalOrder()
    {
        $order = session('order');
        $user = Auth::user();

        return view('pages.paypal.paypal-order', compact('user', 'order'));
    }

    public function paypal(Request $request)
    {

        $currentOrder = session('order');
        $total = $currentOrder->total;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('success'),
                'cancel_url' => route('cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $total,
                    ]
                ]
            ]
                    ]);
        //dd($response);

        if(isset($response['id']) && $response['id'] != null) {

            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }

        } else {
            return redirect()->route('cancel');
        }

    }

    public function success(Request $request)
    {
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            // Change Order Status
            $currentOrder = session('order');
            $currentOrder->status = 'completed';
            $currentOrder->save();

            // Send Email
            $websiteInfo = Websiteinfo::first();
            $user = Auth::user();
            $data = [
                'username' => $user->name,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'user_phone' => $user->phone_code . ' ' . $user->phone_number,
                'order_code' => $currentOrder->order_code,
                'order_subtotal' => $currentOrder->subtotal,
                'total' => $currentOrder->total,
                'website_name' => config('app.name'),
                'payment_method' => 'PayPal',
            ];
            
            Mail::to($websiteInfo->main_mail)->send(new NewOrderMail($data));
            
            return redirect()->route('order.success');

        } else {
            return redirect()->route('cancel');
        }

    }

    public function cancel()
    {
        
    }
  
}