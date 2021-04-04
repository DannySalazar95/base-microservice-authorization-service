<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register-in-eureka-server', [\App\Http\Controllers\EurekaClientController::class, 'register']);
Route::get('/de-register-in-eureka-server', [\App\Http\Controllers\EurekaClientController::class, 'deRegister']);
Route::get('/info', function () {
   echo 'school-system-auth';
});
Route::get('health', function () {
    echo 'health';
});
