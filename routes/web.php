<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');

Route::get('/prod', [ProductController::class, 'prod']);
Route::post('/store1', [ProductController::class, 'store1'])->name('store1');
Route::get('/fetchall1', [ProductController::class, 'fetchAll1'])->name('fetchAll1');
Route::delete('/delete', [ProductController::class, 'delete'])->name('delete');
Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
Route::post('/update', [ProductController::class, 'update'])->name('update');