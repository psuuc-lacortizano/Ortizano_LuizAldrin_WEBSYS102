<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;

Route::get('/customer/{custId}/{name}/{address}', [OrderController::class, 'customer']);
Route::get('/item/{itemNo}/{name}/{price}', [OrderController::class, 'item']);
Route::get('/order/{custId}/{name}/{orderNo}/{date}', [OrderController::class, 'order']);
Route::get('/orderdetails/{transNo}/{orderNo}/{itemId}/{name}/{price}/{qty}', [OrderController::class, 'orderdetails']);
