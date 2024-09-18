<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user_dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/admin_dashboard', [UserController::class, 'admin_dashboard'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/manager_dashboard', [UserController::class, 'manager_dashboard'])->name('manager.dashboard')->middleware('role:manager');
});

