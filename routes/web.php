<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage'])
    ->middleware('redirectIfLoggedIn')
    ->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');


// Protected Routes
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// Admin Routes
Route::middleware('auth', 'check_role:Admin')->group(function () {
    Route::view('/stock-items', 'admin.storage.index')->name('storage.index');
    Route::view('/category', 'admin.storage.category.index')->name('category.index');
    Route::view('/supplier', 'admin.storage.supplier.index')->name('supplier.index');
    Route::view('/user', 'admin.user.index')->name('admin.user.index');
});

// Ahli Gizi Routes
Route::middleware('auth', 'check_role:Ahli Gizi')->group(function () {

});

// Akuntan Routes
Route::middleware('auth', 'check_role:Akuntan')->group(function () {

});

// Staff Routes
Route::middleware('auth', 'check_role:Staff')->group(function () {

});
