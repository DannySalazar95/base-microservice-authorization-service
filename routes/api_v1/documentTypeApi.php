<?php

use Illuminate\Support\Facades\Route;

Route::prefix('document-types')->group(function () {

    Route::get('/', [\App\Http\Controllers\DocumentTypeController::class, 'index']);
    Route::post('', [\App\Http\Controllers\DocumentTypeController::class, 'store']);
    Route::get('{document_type_id}', [\App\Http\Controllers\DocumentTypeController::class, 'show']);
    Route::put('{document_type_id}', [\App\Http\Controllers\DocumentTypeController::class, 'update']);
    Route::delete('{?document_type_id}', [\App\Http\Controllers\DocumentTypeController::class, 'destroy']);

});