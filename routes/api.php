<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', App\Http\Controllers\Api\Auth\LoginController::class);
Route::get('/information', App\Http\Controllers\Api\Information\GetAllController::class);
Route::get('/information/show/{id}', App\Http\Controllers\Api\Information\ShowDetailController::class);
