<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\OrderApiController;

Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/products', [ProductApiController::class, 'store']);
Route::get('/products/{product}', [ProductApiController::class, 'show']);
Route::put('/products/{id}', [ProductApiController::class, 'update']);
Route::delete('/products/{product}', [ProductApiController::class, 'destroy']);

Route::get('/test-api', function () {
    return response()->json(['status' => 'API OK']);
});

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductApiController::class);
    Route::apiResource('orders', OrderApiController::class);
});



