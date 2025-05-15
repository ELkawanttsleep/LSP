<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Route::get('/test', function () {
//     return view('welcome');
// });

Route::resource('/', App\Http\Controllers\AdminController::class);
Route::resource('/admin', App\Http\Controllers\AdminController::class);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/adduser', App\Http\Controllers\AddUserController::class);
Route::resource('/payment_methods', App\Http\Controllers\PaymentMethodController::class);
Route::resource('/jenis_pengirimans', App\Http\Controllers\JenisPengirimanController::class);
Route::resource('/distributors', App\Http\Controllers\DistributorController::class);
