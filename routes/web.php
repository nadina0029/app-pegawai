<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmenController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalariesController;

Route::get('/', function () {
    return view('Master');
});

Route::resource('employees',EmployeeController::class);
Route::resource('departments',DepartmenController::class);
Route::resource('positions',PositionController::class);
Route::resource('attendances',AttendanceController::class);
Route::resource('salaries',SalariesController::class);