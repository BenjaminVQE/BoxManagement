<?php

use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTemplateController;
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
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::put('/tenants', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');

    Route::get('/contracts/template', [ContractTemplateController::class, 'index'])->name('contracts_template.index');
    Route::get('/contracts/template/{id}/show', [ContractTemplateController::class, 'show'])->name('contracts_template.show');
    Route::get('/contracts/template/create', [ContractTemplateController::class, 'create'])->name('contracts_template.create');
    Route::get('/contracts/template/{id}/edit', [ContractTemplateController::class, 'edit'])->name('contracts_template.edit');
    Route::post('/contracts/template', [ContractTemplateController::class, 'store'])->name('contracts_template.store');
    Route::put('/contracts/template', [ContractTemplateController::class, 'update'])->name('contracts_template.update');
    Route::delete('/contracts/template/{id}', [ContractTemplateController::class, 'destroy'])->name('contracts_template.destroy');

    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/{id}/show', [ContractController::class, 'show'])->name('contracts.show');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::delete('/contracts/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');

    Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
    Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
    Route::patch('/bills/{id}', [BillController::class, 'update'])->name('bills.update');
});

require __DIR__ . '/auth.php';
