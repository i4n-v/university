<?php

use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/university/{university}', [UniversityController::class, 'show'])->name('university.show');
    Route::post('/university', [UniversityController::class, 'store'])->name('university.store');
    Route::put('/university/{university}', [UniversityController::class, 'update'])->name('university.update');
    Route::delete('/university/{university}', [UniversityController::class, 'destroy'])->name('university.destroy');
});
