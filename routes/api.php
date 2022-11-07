<?php

use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellersController;

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

Route::group(['middleware' => 'tray'], function () {
    Route::prefix('sellers')->group(function () {
        Route::post('store', [SellersController::class, 'store']);
        Route::get('/', [SellersController::class, 'index']);
        Route::put('update', [SellersController::class, 'update']);
        Route::delete('delete', [SellersController::class, 'destroy']);
    });
    Route::prefix('sales')->group(function () {
        Route::post('store', [SalesController::class, 'store']);
        Route::get('/', [SalesController::class, 'getSellerSales']);
    });
});
