<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index'])->middleware('auth')->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->middleware('auth')->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->middleware('auth')->name('blog.store');

Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->middleware('auth')->name('blog.edit');
Route::put('/blog/{blog}/update', [BlogController::class, 'update'])->middleware('auth')->name('blog.update');

Route::delete('/blog/{id}/delete', [BlogController::class, 'destroy'])->middleware('auth')->name('blog.delete');