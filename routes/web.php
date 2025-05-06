<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return "Bienvenue sur le site!";
    });
Route::get('/Register', [AuthController::class , 'RegisterPage'])->name('Register.page');
Route::get('/Login', [AuthController::class , 'LoginPage'])->name('Login.page');
Route::post('/Register', [AuthController::class , 'register'])->name('register');
Route::post('/Login', [AuthController::class , 'login'])->name('login');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
