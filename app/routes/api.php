<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return 'test';
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/notes', [NoteController::class, 'index']);
    Route::get('/notes/{note}', [NoteController::class, 'show']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::patch('/notes/{note}', [NoteController::class, 'update']);
    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
});
