<?php

use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('employees', EmployeeController::class);

    Route::resource('departments', DepartmentController::class);

    Route::resource('designations', DesignationController::class);

    Route::get('/admin/leaves', [LeaveController::class, 'adminIndex'])
        ->name('admin.leaves.index');

    Route::patch('/admin/leaves/{leave}/status', [LeaveController::class, 'updateStatus'])
        ->name('admin.leaves.update-status');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/leaves', [LeaveController::class, 'index'])
        ->name('leaves.index');

    Route::get('/leaves/create', [LeaveController::class, 'create'])
        ->name('leaves.create');

    Route::post('/leaves', [LeaveController::class, 'store'])
        ->name('leaves.store');

});

require __DIR__.'/auth.php';
