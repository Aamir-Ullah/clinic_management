<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SpecialtyController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::view('/admin/dashboard', 'dashboards.admin')->name('admin.dashboard');
});


Route::middleware(['auth', 'role:Doctor'])->group(function () {
    Route::view('/doctor/dashboard', 'dashboards.doctor')->name('doctor.dashboard');
});

Route::middleware(['auth', 'role:Patient'])->group(function () {
    Route::view('/patient/dashboard', 'dashboards.patient')->name('patient.dashboard');
});


Route::middleware([
    'auth',
    'role:Admin',
    'permission:manage doctors',
])->prefix('admin')->name('admin.')->group(function () {
    Route::patch('doctors/{doctor}/status', [DoctorController::class, 'toggleStatus'])
        ->name('doctors.toggle-status');
    Route::resource('doctors', DoctorController::class);
    Route::resource('specialties', SpecialtyController::class)
        ->except(['show', 'destroy']);
});
