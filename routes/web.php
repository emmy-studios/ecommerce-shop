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
use App\Http\Controllers\Payments\PaymentController;
use Illuminate\Support\Facades\Route;

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
Route::post('/orders/order-store', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
//Route::get('/orders/order-history', [OrderController::class, 'index'])->name('order.history')->middleware('auth');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show')->middleware('auth');

// Payments Routes
Route::get('/payment-method', [PaymentController::class, 'paymentMethod'])->name('payment.method')->middleware('auth');
Route::get('/pay-by-email', [PaymentController::class, 'payByEmail'])->name('payment.email')->middleware('auth');
Route::post('/pay-by-email', [PaymentController::class, 'payByEmailStore'])->name('pay.email.store')->middleware('auth');
Route::get('/order-success', [PaymentController::class, 'orderSuccess'])->name('order.success')->middleware('auth');
Route::get('/pay-method-edit/{id}', [PaymentController::class, 'payMethodEdit'])->name('payment.method.edit')->middleware('auth');
Route::get('/pay-email-edit', [PaymentController::class, 'payEmailEdit'])->name('payment.email.edit');
Route::post('pay-email-edit', [PaymentController::class, 'payEmailEditStore'])->name('payment.method.edit.store')->middleware('auth');

// Wishlist Routes
Route::get('/wishlist/{id}', [WishlistController::class, 'show'])->name('wishlist.show')->middleware('auth');

// Main App Routes
Route::get('/', [CoreController::class, 'index'])->name('home');
Route::get('/about-us', [CoreController::class, 'aboutUs'])->name('about.us');
Route::post('/about-us', [CoreController::class, 'contactPost'])->name('contact.post');
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
Route::get('/edit-profile', [ProfileController::class, 'profileForm'])->name('profile.edit')->middleware('auth');
Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('auth');

// Invoices Routes
Route::get('/generate-invoice/{id}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate')->middleware('auth');
