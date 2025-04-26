<?php

use Illuminate\Support\Facades\Route;
use App\Interface\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});