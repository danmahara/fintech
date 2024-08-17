<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProjectOwnerController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\CategoryController;
// Public Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('login', [UserController::class, 'loginForm'])->name('loginForm');
Route::get('signup', [UserController::class, 'signupForm'])->name('signupForm');
Route::post('/login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register'])->name('register');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/', [AdminController::class, 'countTotal'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'userList'])->name('admin.users');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('admin.campaignList');
    Route::put('/updateStatus/{id}', [CampaignController::class, 'updateCampaignStatus'])->name('admin.updateCampaignStatus');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});


// Project Owner Routes
Route::group(['prefix' => 'owner', 'middleware' => 'auth'], function () {
    Route::get('/', [ProjectOwnerController::class, 'index'])->name('owner.index');
    Route::get('/', [ProjectOwnerController::class, 'categoryList'])->name('owner.index');
    Route::post('campaignStore', [ProjectOwnerController::class, 'storeCampaign'])->name('campaignStore');
    Route::get('compaign', [CampaignController::class, 'myCampaign'])->name('owner.myCampaign');


    Route::get('investors/{id}', [DonationController::class, 'investorList'])->name('owner.investerList');
    Route::put('/owner/update/{id}', [CampaignController::class, 'updateCampaign'])->name('owner.campaignUpdate');
    Route::post('logout', [ProjectOwnerController::class, 'logout'])->name('owner.logout');
});


// Investor Routes 
Route::group(['prefix' => 'investor', 'middleware' => 'auth'], function () {
    Route::get('/', [InvestorController::class, 'index'])->name('investor.index');
    Route::get('/', [InvestorController::class, 'countTotal'])->name('investor.index');
    Route::get('/investment', [DonationController::class, 'investmentList'])->name('investor.investmentList');
    Route::get('/compaign', [CampaignController::class, 'approvedCampaignList'])->name('investor.campaignList');


    Route::post('donate', [DonationController::class, 'storeDonation'])->name('investor.donate');


    // Route::post('/donate/{id}', [DonationController::class, 'storeDonation'])->name('investor.donate');
    Route::post('logout', [InvestorController::class, 'logout'])->name('investor.logout');
});

