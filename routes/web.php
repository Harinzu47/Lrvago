<?php

use App\Livewire\CartPage;
use App\Livewire\HomePage;
use App\Livewire\CancelPage;
use App\Livewire\ProductPage;
use App\Livewire\SuccessPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\MyOrdersDetailPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Livewire\ReviewForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);

Route::get('/products', ProductPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class)->name('products.show');

Route::middleware('guest')->group(function (){
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset'); 
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout', CheckoutPage::class);
    // Route::post('/check-ongkir', [CheckoutPage::class, 'check_ongkir'])->name('check.ongkir');
    // Route::get('/cities/{province_id}', [CheckoutPage::class, 'getCities']);
    Route::get('/my-orders', MyOrdersPage::class);
    Route::get('/my-orders/{order_id}', MyOrdersDetailPage::class);
    Route::get('my-orders/{order_id}/review', ReviewForm::class);
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('cancel', CancelPage::class);

    Route::get('/payment-page/{snapToken}', function ($snapToken) {
        return view('payment-page', ['snapToken' => $snapToken]);
    })->name('payment-page');
});

Route::post('/webhook/midtrans', [PaymentController::class, 'handleWebhook']);
