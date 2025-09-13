<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [AuthController::class, 'showSignin'])->name('showSignin');
Route::get('/signup',  [AuthController::class, 'showSignup'])->name('showSignup');

Route::post('/signup', [AuthController::class, 'signupPost'])->name('signupPost');
