<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\API\CheckoutController;

Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/cart/add', [CartApiController::class, 'add']);
Route::get('/cart', [CartApiController::class, 'list']);
Route::put('/cart/update/{id}', [CartApiController::class, 'update']);
Route::delete('/cart/delete/{id}', [CartApiController::class, 'delete']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
