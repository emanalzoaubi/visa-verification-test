<?php

use App\Http\Controllers\PassportVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobileNumberVerificationController;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/send-email', [DashboardController::class, 'sendEmail'])->name('send-email');
Route::get('/mobile-number-verification', [MobileNumberVerificationController::class, 'index']);
Route::post('/mobile-number-verification', [MobileNumberVerificationController::class, 'verify'])->name('verify-mobile');
Route::get('/passport-verification/{userId}', [PassportVerificationController::class, 'index'])->name('verify-passport');
Route::post('/visa-submit', [PassportVerificationController::class, 'store'])->name('visa-submit');