<?php
use Illuminate\Support\Facades\Route;

Route::prefix('parts')->group(function () {
    Route::get('/', [\App\Http\Controllers\PartsController::class, 'index'])->name('parts.index');
    Route::get('/create', [\App\Http\Controllers\PartsController::class, 'create'])->name('parts.create');
    Route::post('/', [\App\Http\Controllers\PartsController::class, 'store'])->name('parts.store');
    Route::get('/{part}/edit', [\App\Http\Controllers\PartsController::class, 'edit'])->name('parts.edit');
    Route::put('/{part}', [\App\Http\Controllers\PartsController::class, 'update'])->name('parts.update');
    Route::delete('/{part}', [\App\Http\Controllers\PartsController::class, 'destroy'])->name('parts.destroy');
});
