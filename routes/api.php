<?php

use App\Http\Controllers\Api\KintoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('kintone')->name('kintone.')->group(function () {
  Route::get('/get-record', [KintoneController::class, 'getRecord']);
  Route::post('/add-record', [KintoneController::class, 'addRecord']);
  Route::put('/update-record', [KintoneController::class, 'updateRecord']);
});

