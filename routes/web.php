<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
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
    Route::view('/', 'welcome');
});

Route::group(["prefix" => "tv", "middleware" => ["auth:tv", "tvCheck"], "as" => "tv."], function () {
    Route::view('/', 'welcome');
});

Route::group(["prefix" => "customer", "middleware" => ["auth:customer", "customerCheck"], "as" => "customer."], function () {
    Route::view('/', 'welcome');
});
