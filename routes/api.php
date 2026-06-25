<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItuController;
use App\Http\Controllers\Api\AdminController;

// ✅ Public
Route::post('/itu', [ItuController::class, 'store']);
Route::post('/register', [AdminController::class, 'register']);
Route::post('/login', [AdminController::class, 'login']);

// 🔒 Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/itu', [ItuController::class, 'index']);
    Route::get('/itu/{id}', [ItuController::class, 'show']);
    Route::post('/logout', [AdminController::class, 'logout']);
});