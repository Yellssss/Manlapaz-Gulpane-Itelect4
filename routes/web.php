<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('employee', [\App\Http\Controllers\UserController::class, 'index']);
    Route::post('employee', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('employee', [\App\Http\Controllers\employeecontroller::class, 'index'])->name('employee.index');
    Route::get('employee/create', [\App\Http\Controllers\UserController::class, 'index'])->name('employee.create');
    Route::post('employee', [\App\Http\Controllers\UserController::class, 'store'])->name('employee.store');

    Route::post('employee/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('employee.edit');
    Route::get('employee/{id}/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('employee.update');
    Route::post('employee/{id}/delete', [\App\Http\Controllers\UserController::class, 'destroy'])->name('employee.delete');

    // Employee Management
    
   
    
    //end of employee management

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
