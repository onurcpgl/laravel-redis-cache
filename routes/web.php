<?php

use Illuminate\Support\Facades\Route;
#Controller
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test', function () {
    return view('test');
});


#Api

Route::get('get-product-database',[ProductController::class, "getProductDatabase"]);

Route::get('get-product-redis', [ProductController::class, "getProductRedis"]);

