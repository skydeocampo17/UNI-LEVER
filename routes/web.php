<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CollegeController;

Route::get('/', function () {
    return redirect('/colleges');
});

Route::resource('colleges', CollegeController::class);
Route::get('/select-college', [CollegeController::class, 'select'])->name('colleges.select');

Route::resource('departments', DepartmentController::class);

//EDIT TEST

Master
