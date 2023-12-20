<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');

Route::get('/', [ProductController::class, 'prod']);
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/fetchall', [ProductController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [ProductController::class, 'delete'])->name('delete');
Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
Route::post('/update', [ProductController::class, 'update'])->name('update');