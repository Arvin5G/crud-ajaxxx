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
Route::delete('/delete1', [ProductController::class, 'delete1'])->name('delete1');
Route::get('/edit1', [ProductController::class, 'edit1'])->name('edit1');
Route::post('/update1', [ProductController::class, 'update1'])->name('update1');