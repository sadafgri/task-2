<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/blog/create', [\App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::post('/blog', [\App\Http\Controllers\PostController::class,'store'])->name('post.store');
Route::get('/blog/{id}/show', [\App\Http\Controllers\PostController::class,'show'])->name('post.show');
Route::post('/blog/update', [\App\Http\Controllers\PostController::class,'update'])->name('post.update');
Route::post('/blog/delete', [\App\Http\Controllers\PostController::class,'show'])->name('post.delete');
