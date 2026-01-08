<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\SellerMiddleware;

// Auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

// SELLER DASHBOARD
// Route::get('/seller/dashboard', function () {
//     return view('seller.dashboard');
// })->middleware('auth')->name('seller.dashboard');

Route::middleware([SellerMiddleware::class])
    ->get('/seller/dashboard', function () {
        return view('seller.dashboard');
    });

// HOME
Route::get('/', function () {
    return view('welcome');
});

// PROTECTED ROUTE
Route::middleware('auth')->group(function () {

    // PRODUK
    Route::resource('/products', ProductController::class);

    // PESANAN
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus']);
    Route::resource('/orders', OrderController::class)->only(['index', 'edit', 'update', 'show']);
});

Route::get('/images/{path}', function ($path) {
    $file = storage_path('app/public/images/' . $path);

    abort_if(!file_exists($file), 404);

    return response()->file($file, [
        'Access-Control-Allow-Origin' => '*',
    ]);
})->where('path', '.*');