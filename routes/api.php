<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function() {
    // Statistik Route
    Route::group(['prefix' => 'statistik', 'as' => 'statistik.'], function(){
        Route::post('/statistik/get_top_sales_product', [\App\Http\Controllers\API\StatistikController::class, 'get_top_sales_product'])->name('get_top_sales_product');
        Route::post('/statistik/get_penjualan_harian', [\App\Http\Controllers\API\StatistikController::class, 'get_penjualan_harian'])->name('get_penjualan_harian');
    });
});
