<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveRequestAdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('employees', EmployeeController::class);
        Route::resource('leave-types', LeaveTypeController::class);


        Route::get('leave-requests', [LeaveRequestAdminController::class, 'index'])->name('admin.leave-requests.index');
        Route::get('leave-requests/{id}/approve', [LeaveRequestAdminController::class, 'approve'])->name('leave-requests.approve');
        Route::get('leave-requests/{id}/deny', [LeaveRequestAdminController::class, 'deny'])->name('leave-requests.deny');
        Route::post('leave-requests/{id}/approve', [LeaveRequestAdminController::class, 'storeApproval'])->name('leave-requests.approve.store');
        Route::post('leave-requests/{id}/deny', [LeaveRequestAdminController::class, 'storeDenial'])->name('leave-requests.deny.store');
    });


    // Route::middleware('employee' )->group(function () {
        Route::resource('leave-requests', LeaveRequestController::class);
    // });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
