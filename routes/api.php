<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Image\ImageController;
use App\Http\Controllers\Order\CustomerOrderController;
use App\Http\Controllers\Order\DeliveryOrderController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\WarehouseOrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Shopping\CartController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\UserController;

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
    Route::get('/logout', [UserController::class, 'logout']);
    // ------- Route Customer ------------
    Route::prefix('customer')->group(function () {
        Route::get('getMyInformation', [CustomerController::class, 'getMyInformation']);
        Route::get('getCustomerDetails/{id}', [CustomerController::class, 'getCustomerDetails']);
        Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
        Route::get('getCartItem', [CartController::class, 'getCartItem']);
        Route::post('/addLensesToCart', [CartController::class, 'addLensesToCart']);
        Route::get('getMyOrder', [CustomerOrderController::class, 'getMyOrder']);
        Route::post('sendOrder', [CustomerOrderController::class, 'sendOrder']);
    });
//    -------------- Route Warehouse --------------
    Route::prefix('warehouse')->group(function () {
        Route::get('allOrder', [WarehouseOrderController::class, 'getAllOrder']);
        Route::get('executedOrder', [WarehouseOrderController::class, 'getExecutedOrder']);
        Route::get('NewOrder', [WarehouseOrderController::class, 'getNewOrder']);
        Route::get('executeOrder/{id}', [WarehouseOrderController::class, 'executeOrder']);
    });
//    ------------- Route Delivery ---------------
    Route::prefix('delivery')->group(function () {
        Route::get('allOrder', [DeliveryOrderController::class, 'getAllOrder']);
        Route::get('receiveOrder/{id}', [DeliveryOrderController::class, 'receiveOrderFromWarehouse']);
        Route::get('deliverOrder/{id}', [DeliveryOrderController::class, 'deliverOrderToCustomer']);
        Route::get('executedOrder', [DeliveryOrderController::class, 'getExecutedOrder']);
        Route::get('NewOrder', [DeliveryOrderController::class, 'getNewOrder']);

    });
//    ------------- Route Maintenance ------------
    Route::prefix('maintenance')->group(function () {
        Route::get('allOrder', [MaintenanceOrderController::class, 'getAllOrder']);
    });
//    --------------  Route Product --------------

    Route::prefix('product')->group(function () {
        Route::post('storeFrame', [ProductController::class, 'storeFrame']);
        Route::post('storeLenses', [ProductController::class, 'storeLenses']);
        Route::post('storeDevice', [ProductController::class, 'storeDevice']);
    });
//    ------------ Route Order  ----------------------------
    Route::prefix('order')->group(function () {
        Route::get('allOrder', [OrderController::class, 'getAllOrder']);
        Route::get('getOrderById/{id}', [OrderController::class, 'getOrderById']);
        Route::post('reject/{id}', [OrderController::class, 'rejectOrder']);
    });

});

// Route without authentication
//    --------------  Route Customer --------------
Route::prefix('customer')->group(function () {
    Route::post('register', [CustomerController::class, 'register']);
});

//    --------------  Route Product --------------

Route::prefix('product')->group(function () {
    Route::get('allProducts', [ProductController::class, 'getAllProduct']);
    Route::get('getProduct/{id}', [ProductController::class, 'getProductById']);
    Route::get('getKidsProduct', [ProductController::class, 'getKidsProduct']);
    Route::get('getMenProduct', [ProductController::class, 'getMenProduct']);
    Route::get('getWomenProduct', [ProductController::class, 'getWomenProduct']);
    Route::get('getFrameProducts', [ProductController::class, 'getFrameProducts']);
    Route::get('getDevicesProducts', [ProductController::class, 'getDevicesProducts']);
    Route::get('getLensesProducts', [ProductController::class, 'getLensesProducts']);
    Route::get('searchProduct/{numberModel}', [ProductController::class, 'searchProduct']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'getCategory']);
});

Route::post('login', [UserController::class, 'login']);
Route::get('images/{filename}', [ImageController::class, 'showImage'])->name('image.show')->where('filename', '.*');;
Route::get('ProductImage/{id}', [ProductController::class, 'getOneImageProduct'])->name('ProductImage');


