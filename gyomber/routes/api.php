<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);


use App\Http\Controllers\UploadController;

Route::post('/save-json-to-database', [UploadController::class, 'store']);
