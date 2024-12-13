<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('employee',[EmployeeController::class, 'employee']);
Route::POST('submit',[EmployeeController::class, 'Submit']);
Route::POST('update',[EmployeeController::class, 'index']);