<?php

use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Order\AdminOrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\AuthAdminController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EmployeeController;
use Illuminate\Support\Facades\Route;


/**
 *  Admin Route
 */
Route::middleware('auth:admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');
    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employee.index');
        Route::get('/create', [EmployeeController::class, 'createEmployee'])->name('admin.employee.create');
        Route::post('store', [EmployeeController::class, 'storeEmployee'])->name('admin.employee.store');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');
    });
    Route::prefix('Product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
    });
    Route::prefix('offer')->group(function () {
        Route::get('/', [OfferController::class, 'index'])->name('admin.offer.index');
    });
    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.order.index');
    });
});
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('login', [AuthAdminController::class, 'showAdminLogin'])->name('admin.showLogin');
    Route::post('login', [AuthAdminController::class, 'login'])->name('admin.login');
});

//    ------------ Route Order  ----------------------------
    Route::prefix('order')->group(function () {
        Route::get('allOrder', [AdminOrderController::class, 'getAllOrder']);
    });

