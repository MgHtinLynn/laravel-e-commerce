<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/add-to-card', [HomeController::class, 'addToCart'])->name('add-to-cart');

Route::get('/checkout', [PaymentController::class, 'checkoutView'])->name('checkout.view');

Route::post('create-checkout-session',
    [PaymentController::class, 'createCheckoutSession'])->name('create-checkout-session');

Route::get('/checkout-success', [PaymentController::class, 'checkoutSuccess'])->name('checkout-success');
Route::post('/checkout-store', [PaymentController::class, 'storeTransactions'])->name('checkout-store');
Route::view('/checkout-cancel', 'checkout.cancel')->name('checkout-cancel');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('transaction-list', TransactionListController::class);
        Route::resource('customer-list', CustomerController::class);
        Route::resource('item-list', ItemController::class);
        Route::get('category-list', [ItemController::class, 'getCategoryList'])->name('category.list');
    });
});
