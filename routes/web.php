<?php

use App\Http\Controllers\Accounts\AuthenticationController;
use App\Http\Controllers\Accounts\PasswordController;
use App\Http\Controllers\Accounts\ProfileController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Shoppingcarts\ShoppingcartController;
use App\Http\Controllers\Wishlists\WishlistController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Core\CoreController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Invoices\InvoiceController;
use App\Http\Controllers\Orders\OrderCancelController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\Payments\PaypalController;
use App\Http\Middleware\Localization;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')
    ->middleware(Localization::class) 
    ->group(function () {

        // News Routes
        Route::get('/news', [NewsController::class, 'index'])->name('news');
        Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
        // Products Routes
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
        // Shopping Carts Routes
        Route::get('/shoppingcart/{id}', [ShoppingcartController::class, 'show'])->name('shoppingcart.show');
        // Order Routes
        Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
        Route::post('/orders/create', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show')->middleware('auth');
        Route::get('/orders-cancel', [OrderCancelController::class, 'cancelOrder'])->name('order.cancel')->middleware('auth');
        Route::post('/orders/cancel', [OrderCancelController::class, 'cancelOrderPost'])->name('order.cancel.post')->middleware('auth');
        Route::get('/orders-delete', [OrderController::class, 'orderDelete'])->name('order.delete')->middleware('auth');
        Route::post('/orders/delete', [OrderController::class, 'orderDeletePost'])->name('order.delete.post')->middleware('auth');
        Route::get('/orders-report/{id}', [OrderController::class, 'orderReport'])->name('order.report')->middleware('auth');
        // Payments Routes
        Route::get('/payment-method', [PaymentController::class, 'paymentMethod'])->name('payment.method')->middleware('auth');
        Route::get('/pay-by-email', [PaymentController::class, 'payByEmail'])->name('payment.email')->middleware('auth');
        Route::post('/pay-by-email', [PaymentController::class, 'payByEmailStore'])->name('pay.email.store')->middleware('auth');
        Route::get('/order-success', [PaymentController::class, 'orderSuccess'])->name('order.success')->middleware('auth');
        Route::get('/pay-method-edit/{id}', [PaymentController::class, 'payMethodEdit'])->name('payment.method.edit')->middleware('auth');
        Route::get('/pay-email-edit', [PaymentController::class, 'payEmailEdit'])->name('payment.email.edit')->middleware('auth');
        Route::post('pay-email-edit', [PaymentController::class, 'payEmailEditStore'])->name('payment.method.edit.store')->middleware('auth');
        // PayPal Routes 
        Route::get('/paypal/order', [PaypalController::class, 'paypalOrder'])->name('paypal.order')->middleware('auth');
        Route::post('/paypal', [PaypalController::class, 'paypal'])->name('paypal')->middleware('auth');
        Route::get('/success', [PaypalController::class, 'success'])->name('success')->middleware('auth');
        Route::get('/cancel', [PaypalController::class, 'cancel'])->name('cancel')->middleware('auth'); 
        // Wishlist Routes
        Route::get('/wishlist/{id}', [WishlistController::class, 'show'])->name('wishlist.show')->middleware('auth');
        // Main App Routes
        Route::get('/', [CoreController::class, 'index'])->name('home');
        Route::get('/contact-us', [CoreController::class, 'contactUs'])->name('contact.us');
        Route::post('/contact-us/post', [CoreController::class, 'contactPost'])->name('contact.post');
        Route::get('/brands', [CoreController::class, 'brands'])->name('brands');
        // Authentication Routes
        Route::get('/signup', [AuthenticationController::class, 'signup'])->name('signup');
        Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
        Route::get('/forgot', [PasswordController::class, 'forgot'])->name('forgot');
        Route::post('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('forgot.password');
        Route::get('/reset/{token}', [PasswordController::class, 'reset'])->name('reset.password');
        Route::post('/reset/{token}', [PasswordController::class, 'resetPost'])->name('reset.password.post');
        Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
        Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
        // Profile Routes
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard')->middleware('auth'); 
        Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('auth');
        Route::get('/edit-profile', [ProfileController::class, 'profileForm'])->name('profile.edit')->middleware('auth');
        // Invoices Routes
        Route::get('/generate-invoice/{id}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate')->middleware('auth');

    });




