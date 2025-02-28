<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TermController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/base', [HomeController::class, 'base'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/submit-login', [AuthController::class, 'submitLogin'])->name('submitLogin');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login-user', [AuthController::class, 'loginUser'])->name('loginUser');
    Route::post('/login-user-submit', [AuthController::class, 'loginUserSubmit'])->name('loginUserSubmit');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
    Route::post('/forget-password-submit', [AuthController::class, 'forgetPasswordSubmit'])->name('forgetPasswordSubmit');
    Route::get('/user', [AuthController::class, 'user'])->name('user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('entry')->name('entry.')->group(function () {
    Route::get('/flow', [EntryController::class, 'flow'])->name('flow');
    Route::get('/step-one', [EntryController::class, 'stepOne'])->name('stepOne');
    Route::post('/step-one-submit', [EntryController::class, 'stepOneSubmit'])->name('stepOneSubmit');
    Route::post('/step-one-submit2', [EntryController::class, 'stepOneSubmit2'])->name('stepOneSubmit2');
    Route::get('/step-two', [EntryController::class, 'stepTwo'])->name('stepTwo');
    Route::post('/step-two-submit', [EntryController::class, 'stepTwoSubmit'])->name('stepTwoSubmit');
    Route::get('/step-three', [EntryController::class, 'stepThree'])->name('stepThree');
    Route::get('/edit', [EntryController::class, 'editStepOne'])->name('editStepOne');
    Route::post('/edit-step-one-submit', [EntryController::class, 'editStepOneSubmit'])->name('editStepOneSubmit');
    Route::get('/edit-step-two', [EntryController::class, 'editStepTwo'])->name('editStepTwo');
    Route::post('/edit-step-two-submit', [EntryController::class, 'editStepTwoSubmit'])->name('editStepTwoSubmit');
    Route::get('/edit-step-three', [EntryController::class, 'editStepThree'])->name('editStepThree');
    Route::get('/edit-step-three', [EntryController::class, 'editStepThree'])->name('editStepThree');
});

Route::prefix('purchase')->name('purchase.')->group(function () {
    Route::get('/price-list', [PurchaseController::class, 'priceList'])->name('priceList');
    Route::get('/flow', [PurchaseController::class, 'flow'])->name('flow');
    Route::get('/step-one', [PurchaseController::class, 'stepOne'])->name('stepOne');
    Route::post('/step-one-submit', [PurchaseController::class, 'stepOneSubmit'])->name('stepOneSubmit');
    Route::get('/step-two', [PurchaseController::class, 'stepTwo'])->name('stepTwo');
    Route::post('/step-two-submit', [PurchaseController::class, 'stepTwoSubmit'])->name('stepTwoSubmit');
    Route::get('/step-three', [PurchaseController::class, 'stepThree'])->name('stepThree');
});

Route::prefix('term')->name('term.')->group(function () {
    Route::get('/', [TermController::class, 'index'])->name('index');
});
