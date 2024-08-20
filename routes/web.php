<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('pagina.index');
Route::get('/view/{id}', [App\Http\Controllers\MainController::class, 'view']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CRUD slider
Route::get('admin/slider', [App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
Route::get('admin/slider/create', [App\Http\Controllers\SliderController::class, 'create'])->name('slider.create');
Route::post('admin/slider/store', [App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');
Route::get('admin/slider/edit/{id}', [App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit');
Route::post('admin/slider/{id}', [App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');
Route::delete('admin/slider/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy');

//CRUD libros
Route::get('admin/libros', [App\Http\Controllers\LibrosController::class, 'index'])->name('libros.index');
Route::get('admin/libros/create', [App\Http\Controllers\LibrosController::class, 'create'])->name('libros.create');
Route::post('admin/libros/store', [App\Http\Controllers\LibrosController::class, 'store'])->name('libros.store');
Route::get('admin/libros/edit/{id}', [App\Http\Controllers\LibrosController::class, 'edit'])->name('libros.edit');
Route::post('admin/libros/{id}', [App\Http\Controllers\LibrosController::class, 'update'])->name('libros.update');
Route::delete('admin/libros/{id}', [App\Http\Controllers\LibrosController::class, 'destroy'])->name('libros.destroy');

//Nuevos
Route::get('/admin/nuevos', [App\Http\Controllers\NuevosController::class, 'index']);

//Carrito
Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/add', [App\Http\Controllers\CarritoController::class, 'add'])->name('carrito.add');
Route::delete('/carrito/remove/{id}', [App\Http\Controllers\CarritoController::class, 'remove'])->name('carrito.remove');