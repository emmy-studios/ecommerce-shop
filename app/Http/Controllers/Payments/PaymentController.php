<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Core\Websiteinfo;
use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function paymentMethod()
    {

        $order = session('order');

        return view('pages.payments.payment-method', compact('order'));
    }

    public function payByEmail()
    {
        $user = Auth::user();
        $email= $user->email;

        $order = session('order');

        return view('pages.payments.payment-email', compact('user', 'order'));
    }

    public function payByEmailStore(Request $request)
    {
        $order = session('order');
        $order->status = 'completed';
        $order->save();

        // Send Email
        $websiteInfo = Websiteinfo::first();
        $user = Auth::user();
        $data = [
            'username' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'user_phone' => $user->phone_code . ' ' . $user->phone_number,
            'order_code' => $order->order_code,
            'order_subtotal' => $order->subtotal,
            'total' => $order->total,
            'website_name' => config('app.name'),
        ];
        Mail::to($websiteInfo->main_mail)->send(new NewOrderMail($data));
        return redirect()->route('order.success');
    }

    public function orderSuccess()
    {
        return view('pages.orders.order-success');
    }

    public function payMethodEdit($id)
    {

        $oldOrder = Order::findOrFail($id);
        //$oldOrder = session('oldOrder');
        session(['oldOrder' => $oldOrder]);
        
        return view('pages.payments.payment-method-edit');
    }

    public function payEmailEdit()
    {

        $oldOrder = session('oldOrder');
        $user = Auth::user();

        return view('pages.payments.payment-email-edit', compact('oldOrder', 'user'));
    }

    public function payEmailEditStore(Request $request)
    {
        $websiteInfo = Websiteinfo::first();
        $order_id = $request->oldOrderId;
        $order = Order::findOrFail($order_id);
        $order->status = 'completed';
        $order->save();

        // Send Email
        $user = Auth::user();
        $data = [
            'username' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'user_phone' => $user->phone_code . ' ' . $user->phone_number,
            'order_code' => $order->order_code,
            'order_subtotal' => $order->subtotal,
            'total' => $order->total,
            'website_name' => config('app.name'),
        ];
        Mail::to($websiteInfo->main_mail)->send(new NewOrderMail($data));

        return redirect()->route('order.success');
    }
}
