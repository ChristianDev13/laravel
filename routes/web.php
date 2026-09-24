<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login page
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Login form
Route::post('/login', [AuthController::class, 'login']);


// Register page
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

// Register form
Route::post('/register', [AuthController::class, 'register']);


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Protected Product Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('products.index');
    });

    Route::resource('products', ProductController::class)
        ->only([
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);

});