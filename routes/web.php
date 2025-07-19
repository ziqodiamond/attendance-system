<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ManageLocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    // Routes that only admin users can access
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::name('manage_users.')->prefix('users')->group(function () {
        Route::get('/', [ManageUserController::class, 'index'])->name('index');
        Route::post('/', [ManageUserController::class, 'store'])->name('store');
        Route::put('/{id}', [ManageUserController::class, 'update'])->name('update');
    });

    Route::name('manage_locations.')->prefix('locations')->group(function () {
        Route::get('/', [ManageLocationController::class, 'index'])->name('index');
        Route::post('/', [ManageLocationController::class, 'store'])->name('store');
        Route::put('/{id}', [ManageLocationController::class, 'update'])->name('update');
    });

    Route::name('schedules.')->prefix('schedules')->group(function () {
        Route::get('/', [ManageLocationController::class, 'index'])->name('index');
        Route::post('/', [ManageLocationController::class, 'store'])->name('store');
        Route::put('/{id}', [ManageLocationController::class, 'update'])->name('update');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Routes that only regular users can access
    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

require __DIR__ . '/auth.php';
