<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\AppointmentAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {

    // User
    Route::get('/dashboard', [AppointmentController::class, 'index'])->name('dashboard');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.read');

    // Admin
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/appointments', [AppointmentAdminController::class, 'index'])->name('appointments.index');
        Route::get('/appointments/{appointment}/edit', [AppointmentAdminController::class, 'edit'])->name('appointments.edit');
        Route::put('/appointments/{appointment}', [AppointmentAdminController::class, 'update'])->name('appointments.update');

        Route::post('/appointments/{appointment}/approve', [AppointmentAdminController::class, 'approve'])->name('appointments.approve');
        Route::post('/appointments/{appointment}/reject', [AppointmentAdminController::class, 'reject'])->name('appointments.reject');

        Route::delete('/appointments/{appointment}', [AppointmentAdminController::class, 'destroy'])->name('appointments.destroy');
    });
});
