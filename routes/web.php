<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// page urls

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');





Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');

