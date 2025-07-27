<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page/landing');
});

Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
Route::resource('departments', DepartmentController::class);


