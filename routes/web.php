<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProjectOwnerController;
use App\Http\Controllers\InvestorController;
// Public Routes
Route::get('/', function () {
    return view('index');
});

Route::get('login', [UserController::class, 'loginForm'])->name('loginForm');
Route::get('signup', [UserController::class, 'signupForm'])->name('signupForm');
Route::post('/login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register'])->name('register');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/', [AdminController::class, 'countTotal'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'userList'])->name('admin.users');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('admin.campaign');
});


// Project Owner Routes
Route::group(['prefix' => 'owner', 'middleware' => 'auth'], function () {
    Route::get('/', [ProjectOwnerController::class, 'index'])->name('owner.index');
    Route::post('campaignStore', [ProjectOwnerController::class, 'storeCampaign'])->name('campaignStore'); // Updated route name
    Route::post('logout', [ProjectOwnerController::class, 'logout'])->name('owner.logout');
});


// Investor Routes 
Route::group(['prefix' => 'investor', 'middleware' => 'auth'], function () {
    Route::get('/', [InvestorController::class, 'index'])->name('investor.index');
    Route::get('/', [InvestorController::class, 'countTotal'])->name('investor.index');
    Route::post('logout', [ProjectOwnerController::class, 'logout'])->name('investor.logout');
});
