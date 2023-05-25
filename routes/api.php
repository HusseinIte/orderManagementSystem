<?php

use App\Http\Controllers\Order\CustomerOrderController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\WarehouseOrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Shopping\CartController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\EmployeeController;
use App\Http\Controllers\User\UserController;
use App\Services\Order\WarehouseOrderService;
use App\Services\Users\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route with authentication
Route::middleware('auth:api')->group(function () {

    // ------- Route Customer ------------
    Route::prefix('customer')->group(function () {
        Route::get('/logout', [UserController::class, 'logout']);
        Route::post('/addToCart', [CartController::class, 'addToCart']);
        Route::post('sendOrder', [CustomerOrderController::class, 'sendOrder']);
    });
//    -------------- Route Warehouse --------------
    Route::prefix('warehouse')->group(function () {
        Route::get('allOrder', [WarehouseOrderService::class, 'getAllOrder']);
        Route::get('executeOrder/{id}', [WarehouseOrderController::class, 'executeOrder']);
    });
//    --------------  Route Product --------------

    Route::prefix('product')->group(function () {
        Route::post('store', [ProductController::class, 'storeProduct']);
        Route::get('allProducts', [ProductController::class, 'getAllProduct']);
    });
//    ------------ Route Order  ----------------------------
    Route::prefix('order')->group(function () {
        Route::get('allOrder', [OrderController::class, 'getAllOrder']);
    });

});
// Route without authentication
Route::prefix('customer')->group(function () {
    Route::post('register', [CustomerController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});
