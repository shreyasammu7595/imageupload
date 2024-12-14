<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('employee',[EmployeeController::class, 'employee']);
Route::POST('submit',[EmployeeController::class, 'Submit']);
// Route::POST('update',[EmployeeController::class, 'index']);
// Route::delete('employee/{id}',[EmployeeController::class,'destroy'])->name('employee');
// Route to delete an employee by ID
Route::get('/delete-employee', [EmployeeController::class, 'Employees'])->name('delete-employee');
Route::get('/update-status', [EmployeeController::class, 'update_status']);
Route:: POST('/update-employee', [EmployeeController::class, 'update'])->name('update-employee');
