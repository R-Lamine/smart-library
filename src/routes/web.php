<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AiTestController;

Route::get('/ai/ping', [AiTestController::class, 'ping']);
Route::get('/ai/summary', [AiTestController::class, 'summary']);
