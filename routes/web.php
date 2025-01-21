<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TermController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/login-user', [AuthController::class, 'loginUser'])->name('loginUser');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
    Route::get('/user', [AuthController::class, 'user'])->name('user');
});

Route::prefix('entry')->name('entry.')->group(function () {
    Route::get('/flow', [EntryController::class, 'flow'])->name('flow');
    Route::get('/step-one', [EntryController::class, 'stepOne'])->name('stepOne');
    Route::get('/step-two', [EntryController::class, 'stepTwo'])->name('stepTwo');
    Route::get('/step-three', [EntryController::class, 'stepThree'])->name('stepThree');
});

Route::prefix('purchase')->name('purchase.')->group(function () {
    Route::get('/price-list', [PurchaseController::class, 'priceList'])->name('priceList');
    Route::get('/flow', [PurchaseController::class, 'flow'])->name('flow');
    Route::get('/step-one', [PurchaseController::class, 'stepOne'])->name('stepOne');
    Route::get('/step-two', [PurchaseController::class, 'stepTwo'])->name('stepTwo');
    Route::get('/step-three', [PurchaseController::class, 'stepThree'])->name('stepThree');
});

Route::prefix('term')->name('term.')->group(function () {
    Route::get('/', [TermController::class, 'index'])->name('index');
});
