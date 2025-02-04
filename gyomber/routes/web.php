<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


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
