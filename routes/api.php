<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Api routes
Route::get('users', [ApiController::class, 'getAllUsers']);
Route::get('books', [ApiController::class, 'getAllBooks']);
Route::get('users/{id}', [ApiController::class, 'getUser']);
Route::get('books/{id}', [ApiController::class, 'getBook']);
Route::get('users/{id}/books', [ApiController::class, 'getUsersBooks']);


// Auth routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    ], function ($router){
        Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
        Route::post('logoutall', [App\Http\Controllers\AuthController::class, 'logoutall']);
        Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
        Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);
        // Register
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::any('{any}', function(){
    return response()->jsnon([
        'status' => 'error',
        'message' => "Recourse not found"], 404);
})->where('any', '.*');