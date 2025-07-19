<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ManageLocationController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    // Routes that only admin users can access
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::name('manage.')->prefix('manage')->group(function () {
        Route::get('/', [AdminController::class, 'manageIndex'])->name('index');

        Route::name('users.')->prefix('users')->group(function () {
            Route::get('/', [ManageUserController::class, 'index'])->name('index');
            Route::post('/', [ManageUserController::class, 'store'])->name('store');
            Route::put('/{id}', [ManageUserController::class, 'update'])->name('update');
        });

        Route::name('locations.')->prefix('locations')->group(function () {
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

    Route::name('reports.')->prefix('reports')->group(function () {
        Route::get('/', [AdminController::class, 'reportsIndex'])->name('index');

        Route::name('attendance.')->prefix('attendance')->group(function () {
            Route::get('/check-in', [AdminController::class, 'checkInReport'])->name('check-in');
            Route::get('/check-out', [AdminController::class, 'checkOutReport'])->name('check-out');
            Route::get('/absent', [AdminController::class, 'absentReport'])->name('absent');
        });

        Route::get('/attendance', [AdminController::class, 'attendanceReport'])->name('attendance');
        Route::get('/users', [AdminController::class, 'userReport'])->name('users');
    });
});

Route::middleware(['auth'])->group(function () {
    // Routes that only regular users can access
    Route::get('/', [UserController::class, 'index'])->name('dashboard');

    Route::name('attendance.')->prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('index');
        Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('check_in');
        Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('check_out');
    });
});
~require __DIR__ . '/auth.php';
