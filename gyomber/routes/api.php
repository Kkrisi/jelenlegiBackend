<?php

use App\Http\Controllers\DolgozokController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
Route::get('/index', [DolgozokController::class, 'index']);
Route::get('/dolgozok-tobb-mint-egy', [DolgozokController::class, 'getDolgozokTobbMintEgyKuldottPdf']);
Route::get('/dolgozok-utolso-kuldott-pdf-datum', [DolgozokController::class, 'getDolgozokUtolsoKuldottPdfDatum']);
Route::get('/dolgozok-szama-gyakorlati-helyenkent', [DolgozokController::class, 'getDolgozokSzamaGyakorlatiHelyenkent']);
Route::get('/munkanelkuli', [DolgozokController::class, 'nincsCeg']);
Route::get('/dolgozok-es-iskolajuk', [DolgozokController::class, 'getDolgozokEsIskolajuk']);