<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    //Auth routes
    Route::post('login', [UserController::class, 'login'])->middleware('guest');
    Route::post('register', [UserController::class, 'createUser'])->middleware('guest');

    Route::middleware(['auth:sanctum', 'throttle'])->group(function () {
        //Auth route
        Route::post('logout', [UserController::class, 'logout']);
        Route::get('test', function () {
            return 'hello test'; 
        });
        
    });
});

