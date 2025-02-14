<?php

use App\Http\Controllers\Api\KintoneController;
use App\Http\Controllers\Api\SendGridController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('kintone')->name('kintone.')->group(function () {
  Route::get('/get-record', [KintoneController::class, 'getRecord']);
  Route::post('/add-record', [KintoneController::class, 'addRecord']);
  Route::put('/update-record', [KintoneController::class, 'updateRecord']);
});

Route::prefix('sendgrid')->name('sendgrid.')->group(function () {
  Route::get('/send', [SendGridController::class, 'send']);
});
