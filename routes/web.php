<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->middleware('admin');
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'store'])->name('create.product');
Route::post('/admin/tag', [\App\Http\Controllers\AdminController::class, 'storeTag'])->name('create.tag');
Route::delete('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('delete.product');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{product}', [\App\Http\Controllers\HomeController::class, 'singlePage'])->name('single.product.page');
Route::post('/product/{product}', [\App\Http\Controllers\CommentController::class, 'store'])->name('store.comment');
