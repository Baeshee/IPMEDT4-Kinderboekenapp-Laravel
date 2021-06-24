<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssignmentsController;

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

// API routes
Route::get('books', [ApiController::class, 'getAllBooks']);
Route::get('books/{book_title}', [ApiController::class, 'getBook']);
// Route::get('assignments', [ApiController::class, 'getAllAssignments']);
// Route::patch('assignments/{id}', [ApiController::class, 'updateAnswer']);



// User routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'user',
    ], function ($router){
        Route::get('profile', [ApiController::class, 'getUser']);
        Route::get('profile/books', [ApiController::class, 'getUsersBooks']);
        Route::get('profile/mascotteimg', [ApiController::class, 'getMascotteImg']);
        Route::patch('update', [ApiController::class, 'updateMascotteImg']);
        Route::post('booktouser', [ApiController::class, 'storeBookToUser']);
        Route::get('opdrachten/{isbn}', [ApiController::class, 'getAssignments']);
});

// Auth routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    ], function ($router){
        Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
        Route::post('logoutall', [App\Http\Controllers\AuthController::class, 'logoutall']);
        Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
        Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);
        // Register
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::any('{any}', function(){
    return response()->json([
        'status' => 'error',
        'message' => "Recourse not found"], 404);
})->where('any', '.*');