<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\DolgozokController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfAthelyezController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// bárki által elérhető
Route::post('/login', [UserController::class, 'store']);




Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/munkanelkuli', [DolgozokController::class, 'nincsCeg']);

    Route::get('/index', [DolgozokController::class, 'index']);
    Route::get('/dolgozo-id-szures/{id}', [DolgozokController::class, 'DolgozoIdSzerint']);
    Route::get('/dolgozok-tobb-mint-egy', [DolgozokController::class, 'getDolgozokTobbMintEgyKuldottPdf']);
    Route::get('/dolgozok-utolso-kuldott-pdf-datum', [DolgozokController::class, 'getDolgozokUtolsoKuldottPdfDatum']);
    Route::get('/dolgozok-szama-gyakorlati-helyenkent', [DolgozokController::class, 'getDolgozokSzamaGyakorlatiHelyenkent']);
    Route::get('/dolgozok-es-iskolajuk', [DolgozokController::class, 'getDolgozokEsIskolajuk']);
    
});




Route::middleware(['auth:sanctum', Admin::class])
->group(function () {
    Route::post('/admin/felvisz-felhasznalo/{name}/{email}/{password}/{level}',[AdminController::class, 'felvitel']);
    Route::put('/admin/modosit/{id}/{szint}',[AdminController::class, 'modositJog']);
});



Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);


// gombok mukodése
Route::post('/save-json-to-database', [CsvController::class, 'saveJsonToDatabase']);

Route::get('/send-mail', [MailController::class, 'index']);

// feltoltott fajl athelyezes backendre // ez kell hozzá !!!! php artisan storage:link   !!!
Route::post('/relocate', [PdfAthelyezController::class, 'relocate']);






/* ÁLTALÁNOS KÖTELEZŐ LETÖLTÉSEK */
// composer require laravel/sanctum
// composer require laravel/breeze --dev
// php artisan breeze:install api




// utvonalak ujraírás miatt - letisztázás:
// php artisan route:list
// 1. php artisan route:clear
// 2. php artisan config:cache
// 3. php artisan serve

