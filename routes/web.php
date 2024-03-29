<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::view('/register', 'register');
Route::post('/register', [CustomerController::class, 'store']);

Route::group(["prefix" => "admin", "middleware" => ["auth", "adminCheck"], "as" => "admin."], function () {
    Route::get('/settings', [UserController::class, 'create']);
    Route::put('/settings', [UserController::class, 'update']);
    Route::resource('/tv', TvController::class)->only('index', 'store', 'destroy');
});

Route::group(["prefix" => "tv", "middleware" => ["auth:tv", "tvCheck"], "as" => "tv."], function () {
    Route::get('/', [DashboardController::class, 'tv']);
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::resource('/applications', ApplicationController::class)->only('index', 'destroy');
    Route::get('/applications/approve/{application}', [ApplicationController::class, 'approveApplication']);
    Route::get('/applications/{application}', [ApplicationController::class, 'show']);
    Route::get('/settings', [TvController::class, 'create']);
    Route::put('/settings', [TvController::class, 'update']);
    Route::resource('/categories', CategoryController::class)->only('store', 'destroy');
    Route::resource('/subcategories', SubcategoryController::class)->only('store', 'destroy');
    Route::resource('/prices', PriceController::class)->only('store', 'destroy');
    Route::get('/waiting', [ApplicationController::class, 'waiting']);
    Route::get('/approved', [ApplicationController::class, 'approved']);
    Route::get('/package', [CategoryController::class, 'package']);
    Route::get('/report', [ApplicationController::class, 'report']);
});

Route::group(["prefix" => "customer", "middleware" => ["auth:customer", "customerCheck"], "as" => "customer."], function () {
    Route::get('/application', [ApplicationController::class, 'customerList']);
    Route::resource('/application', ApplicationController::class)->only('store', 'destroy');
    Route::get('/payments', [ApplicationController::class, 'payment']);
    Route::post('/payments', [PaymentController::class, 'store']);
    Route::get('/settings', [CustomerController::class, 'create']);
    Route::put('/settings', [CustomerController::class, 'update']);
});
