<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Public Routes
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

// Protected Routes
Route::middleware('auth:api')->group(function () {
    // Retrieve authenticated user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Update user details
    Route::put('/userUpdate/{id}', [UserController::class, 'update']);

    // Delete user
    Route::delete('/userDelete/{id}', [UserController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});



