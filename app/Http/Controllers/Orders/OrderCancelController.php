<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\CancelOrderMail;
use App\Models\Core\Websiteinfo;
use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderCancelController extends Controller
{
    public function cancelOrder()
    {
        $user = Auth::user();
        $user_email = $user->email;

        return view('pages.orders.order-cancel', compact('user_email'));
    }

    public function cancelOrderPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'order_code' => 'required|string',
        ]);

        $order_code = $request->order_code;
        $email = $request->email;
        $user = Auth::user();
        $order = Order::where('order_code', $order_code)->first();
        
        if (!$order) {
            return back()->withErrors(['order_code' => 'Order not found']);
        }

        $order->status = 'processing';
        $order->save();

        // Send Email
        $websiteInfo = Websiteinfo::first();
        $data = [
            'order_code' => $order_code,
            'email' => $email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'website_name' => config('app.name')
        ];
        Mail::to($websiteInfo->main_mail)->send(new CancelOrderMail($data));
 
        return redirect()->route('dashboard')->with('success', 'Your request has been processed, wait and check your email to continue the cancel proccess!');
    }
}
