<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NotificationController;

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

// Admin only routes
Route::middleware('auth', 'isAdmin')->group(function(){
    Route::get('/catalogue/admin', [CatalogueController::class, 'indexAdmin'])->name('admin.catalogue');
    Route::get('/catalogue/create', [CatalogueController::class, 'create'])->name('admin.product.create');
    Route::post('/catalogue/create', [CatalogueController::class, 'store'])->name('admin.product.store');
    Route::get('/catalogue/edit/{id}', [CatalogueController::class, 'edit']);
    Route::post('/catalogue/update', [CatalogueController::class, 'update'])->name('admin.product.update');
    Route::delete('/catalogue/delete', [CatalogueController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/banner', [CatalogueController::class, 'indexAdmin'])->name('admin.banner');
});

// Manager only routes
Route::middleware('auth', 'isManager')->group(function(){
    Route::get('/orders/list', [OrderController::class, 'index']);
    Route::post('/orders/update', [OrderController::class, 'update']);
});

// Logged in user only routes
Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::post('/checkout', [OrderController::class, 'addToCheckout'])->name('checkout');
    Route::post('/pay', [OrderController::class, 'pay']);
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders');
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notification/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notif.markAsRead');
    Route::post('/notification/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notif.markAllAsRead');
});

// Guest only routes
Route::middleware('guest')->group(function(){
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/register', [RegisterController::class, 'store']);
});

// Bisa diakses kapan saja
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/catalogue/search', [CatalogueController::class, 'searchProduct']);
Route::get('/catalogue/sort', [CatalogueController::class, 'sortProduct']);
Route::get('/product/{id}', [CatalogueController::class, 'showProduct']);

// Jika mengakses route di luar yang ada diatas, maka akan automatis redirect ke home
Route::fallback(function () {
    return redirect()->route('home');
});