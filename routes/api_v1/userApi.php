<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {


    Route::get('', [\App\Http\Controllers\UserController::class, 'index']);
    Route::post('', [\App\Http\Controllers\UserController::class, 'store']);
    Route::get('{user_id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::put('{user_id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('{?user_id}', [\App\Http\Controllers\UserController::class, 'destroy']);

});