<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\EmployeeController;

Route::prefix('employee')->group(function () {
    Route::post('/', [EmployeeController::class, 'import']);
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
});