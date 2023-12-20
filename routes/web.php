<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'prod']);
Route::post('/store1', [ProductController::class, 'store1'])->name('store1');
Route::get('/fetchall1', [ProductController::class, 'fetchAll1'])->name('fetchAll1');
Route::delete('/delete1', [ProductController::class, 'delete1'])->name('delete1');
Route::get('/edit1', [ProductController::class, 'edit1'])->name('edit1');
Route::get('/view1', [ProductController::class, 'view1'])->name('view1');
Route::post('/update1', [ProductController::class, 'update1'])->name('update1');