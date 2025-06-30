<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;



// Stripe Checkout
Route::get('/order', [OrderController::class, 'showCheckout'])->name('order.stripe');

// Route::get('/order', [StripePaymentController::class, 'order'])->name('order.stripe');
Route::post('/stripe', [StripePaymentController::class, 'checkout'])->name('stripe.checkout');
Route::get('/success/{orderId}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/fail/{orderId}', [PaymentController::class, 'fail'])->name('payment.fail');

// Kasse (Bestellübersicht, Kundendaten)
// Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('order.checkout');
Route::post('/order/submit', [OrderController::class, 'submitOrder'])->name('order.submit');
// Route::get('/order/thankyou', [OrderController::class, 'thankYou'])->name('order.thankyou');
Route::get('/order/thankyou/{orderId}', [OrderController::class, 'thankYou'])->name('order.thankyou');


// Warenkorb


// Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

Route::get('/cart', [CartController::class, 'cart'])->name('cart.show')->middleware('auth');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Produkte
Route::resource('products', ProductController::class);
// Route::group(['middleware' => ['auth', 'admin']], function () {
//     Route::resource('products', ProductController::class)->except(['index', 'show']);
// });





//zahlung
Route::post('/stripe/checkout', [StripePaymentController::class, 'checkout'])->name('stripe.checkout');
Route::get('/stripe/success', [StripePaymentController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripePaymentController::class, 'cancel'])->name('stripe.cancel');

// Startseite und Kategorien
Route::get('/', function () {
    $categories = Category::all();
    return view('startseite', ['categories' => $categories]);
});
Route::get('/product/{catid?}', function($catid = null) {
    $products = $catid
        ? Product::where('category_id', $catid)->paginate(5)
        : Product::paginate(5);
    return view('products.product', ['products' => $products]);
});
Route::get('/category', function() {
    $categories = Category::all();
    $products = Product::all();
    return view('category', ['products' => $products, 'categories' => $categories]);
});


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Auth::routes();
