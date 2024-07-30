<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CarRentController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboarduser', [UserController::class, 'homeuser'])->middleware('only_client');
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    Route::post('clientntuser-edit', [UserController::class, 'edit']);

    Route::middleware('only_admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('car', [MobilController::class, 'index']);
        Route::post('add-car', [MobilController::class, 'store']);
        Route::get('car-edit/{slug}', [MobilController::class, 'edit']);
        Route::post('cars-edit/{slug}', [MobilController::class, 'update']);
        Route::get('car-destroy/{slug}', [MobilController::class, 'destroy']);
        
        Route::get('brand', [BrandController::class, 'index']);
        Route::post('brands-add', [BrandController::class, 'store']);
        Route::get('brand-edit/{slug}', [BrandController::class, 'edit']);
        Route::put('brands-edit/{slug}', [BrandController::class, 'update']);
        Route::get('brand-hapus/{slug}', [BrandController::class, 'delete']);
    
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::post('users-edit/{slug}', [UserController::class, 'update']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('mobil-rent', [CarRentController::class, 'index']);
        Route::post('mobils-rent', [CarRentController::class, 'store']);
    
        Route::get('rent-logs', [RentLogController::class, 'index']);

        Route::get('returncar', [CarRentController::class, 'returnCar']);
        Route::post('return-cars', [CarRentController::class, 'saveReturnCar']);

    });
});

