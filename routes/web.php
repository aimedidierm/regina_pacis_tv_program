<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
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
    return view('index');
});

Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/register', [CustomerController::class, 'store']);

Route::group(["prefix" => "admin", "middleware" => ["auth", "adminCheck"], "as" => "admin."], function () {
    Route::get('/settings', [UserController::class, 'create']);
    Route::put('/settings', [UserController::class, 'update']);
    Route::resource('/tv', TvController::class)->only('index', 'store', 'destroy');
});

Route::group(["prefix" => "tv", "middleware" => ["auth:tv", "tvCheck"], "as" => "tv."], function () {
    Route::get('/settings', [TvController::class, 'create']);
    Route::put('/settings', [TvController::class, 'update']);
});

Route::group(["prefix" => "customer", "middleware" => ["auth:customer", "customerCheck"], "as" => "customer."], function () {
    Route::get('/settings', [CustomerController::class, 'create']);
    Route::put('/settings', [CustomerController::class, 'update']);
});
