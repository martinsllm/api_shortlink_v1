<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{name}', [ShortLinkController::class, 'show'])
    ->middleware('guest')
    ->name('shortlink.show');