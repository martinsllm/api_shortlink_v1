<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShortLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/store', [ShortLinkController::class, 'store'])
    ->name('shortlink.store');
