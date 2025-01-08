<?php

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('form','form');
Route::post('form-submit',[CRUDController::class,'store_student'])->name('form.submit');
Route::get('display',[CRUDController::class,'display_student'])->name('display-student');
Route::get('edit-student/{id}',[CRUDController::class,'edit_student'])->name('student.edit');
Route::put('update-student',[CRUDController::class,'update_student'])->name('student.update');
Route::delete('delete-student/{id}',[CRUDController::class,'delete_student'])->name('student.delete');

Route::get('employee-form',[EmployeeController::class,'employee_form']);
Route::post('employee-form-submit',[EmployeeController::class,'store_employee'])->name('employee.form');
Route::get('display-employee',[EmployeeController::class,'display'])->name('employee.display');
Route::get('edit-employee/{id}',[EmployeeController::class,'edit_employee'])->name('employee.edit');
Route::put('update-employee',[EmployeeController::class,'update_employee'])->name('employee.update');
Route::delete('delete-employee/{id}',[EmployeeController::class,'delete_employee'])->name('employee.delete');
