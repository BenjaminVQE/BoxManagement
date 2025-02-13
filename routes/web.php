<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('/boxes/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::get('/boxes/{id}/edit', [BoxController::class, 'edit'])->name('boxes.edit');
    Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
    Route::put('/boxes', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/boxes/{id}', [BoxController::class, 'destroy'])->name('boxes.destroy');

    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::put('/tenants', [TenantController::class, 'update'])->name('tenants.update');
});

require __DIR__ . '/auth.php';
