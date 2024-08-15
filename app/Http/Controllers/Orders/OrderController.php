<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Core\Websiteinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Customers\Address;
use App\Models\Discounts\Discount;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    
    public function index()
    {
        //
    }

    public function show($locale, $id)
    {   
        $user = Auth::user();
        $order = Order::findOrFail($id); 
        $createdAt = $order->created_at->format('d F Y \a\t h:i A');    
        $websiteInfo = Websiteinfo::first();    

        // Order Items
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('pages.orders.order-detail', compact('order', 'createdAt', 'user', 'orderItems', 'websiteInfo'));
    }  

    public function create()
    {   
        // Obtener Información del usuario
        $user = Auth::user();
        $websiteInfo = Websiteinfo::first();

        // Obtener el carrito de compras del usuario
        $shoppingcart = Shoppingcart::where('user_id', Auth::id())->first();

        if ($shoppingcart) {
        // Cargar los productos con sus detalles
            $products = $shoppingcart->products()->with('productDetails.color', 'productDetails.size', 'productImages')->get();
        } else {
            $products = collect(); // Si no hay carrito, crear una colección vacía
        }

        // Calcular Total y Subtotal
        if ($shoppingcart) {
            $subtotal = $shoppingcart->products()->sum('unit_price');
            $total = $subtotal;
        } else {
            $subtotal = 0;
            $total = 0;
        }

        // Mostrar Datetime
        $currentDateTime = now()->format('d F Y \a\t h:i A');

        // Calcular Numero de orders
        $orderCount = Order::where('user_id', $user->id)->count();

        return view('pages.orders.order-create', compact('shoppingcart', 'products', 'user', 'subtotal', 'total', 'currentDateTime', 'orderCount', 'websiteInfo'));
    }

    public function store(Request $request)
    {   
        // Get the Customer Information
        $username = Auth::user()->name;
        $user_id = Auth::id();
        $timestamp = now()->format('YmdHis');
        $order_code =  $username . $timestamp;

        // Create New Empty Order
        $order = new Order();
        $order->user_id = $user_id;
        $order->order_code = $order_code;
        $order->subtotal = 0;
        $order->total = 0;
        $order->save();
        
        // Add the Items to the Order
        $subtotal = 0;
        $totalDiscount = 0;

        foreach ($request->products as $productId => $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->color = $product['color'];
            $orderItem->size = $product['size'];
            $orderItem->quantity = $product['quantity'];
            $orderItem->unit_price = $product['price'];
            $orderItem->save();

            $subtotal += $product['price'] * $product['quantity']; // Subtotal Before Discounts

            // Check for Discount on the Product
            $discount = Discount::whereHas('products', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })->first();

            if ($discount) {
                $discountAmount = ($product['price'] * $product['quantity']) * ($discount->discount_percentage / 100);
                $totalDiscount += $discountAmount;
            }
        }

        // Update Total After the Discounts
        $order->subtotal = $subtotal;
        $order->total = $subtotal - $totalDiscount;
        $order->status = 'pending'; 
        $order->save();

         session(['order' => $order]);

        return redirect()->route('payment.method');
    }

    public function orderDelete()
    {

        return view('pages.orders.order-delete');
    }

    public function orderDeletePost(Request $request)
    {
        $oldOrder = session('oldOrder');
        $order_id = $oldOrder->id;
        $orderToDelete = Order::findOrfail($order_id);

        if ($orderToDelete) {
            
            $orderToDelete->delete();

            return redirect()->route('dashboard');
        } else {
            return back()->withErrors('Order Not Found');
        }
        
    }

    public function orderReport($id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.order-report', ['order' => $order]);
    }

}
