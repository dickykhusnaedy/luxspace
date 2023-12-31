<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
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

/**
 * Frontend routes
 */
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/detail/{slug}', [FrontendController::class, 'details'])->name('details');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout/success', [FrontendController::class, 'success'])->name('checkout-success');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
	Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
	Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
	Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete');
	Route::get('/checkout/success', [FrontendController::class, 'success'])->name('checkout-success');
});

/**
 * Dashboard routes
 */
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
	Route::get('/', [DashboardController::class, 'index'])->name('index');

	Route::middleware(['admin'])->group(function () {
		Route::resource('product', ProductController::class);
		Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
			'index', 'create', 'store', 'destroy'
		]);
		Route::resource('transaction', TransactionController::class)->only([
			'index', 'show', 'edit', 'update'
		]);
		Route::resource('user', UserController::class)->only([
			'index', 'edit', 'update', 'destroy'
		]);
	});
});
