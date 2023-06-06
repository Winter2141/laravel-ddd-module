<?php

use Illuminate\Support\Facades\Route;

Route::prefix('vehicle')->group(function () {
    Route::get('/', [\App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/create', [\App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/', [\App\Http\Controllers\VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/{vehicle}/edit', [\App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::put('/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicle.destroy');
});
