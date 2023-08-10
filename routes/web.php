<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    return view('control-panel.dashboard');
})->name('dashboard');

Route::get('/pos', function () {
    return view('pos.index');
})->name('pos');


// category
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/{id}/delete',[CategoryController::class,'destroy'])->name('category.delete');


// product
Route::get('/produk',[ProductController::class,'index'])->name('product.index');
Route::get('/produk/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/produk/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('/produk/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/produk/{id}/delete',[ProductController::class,'destroy'])->name('product.delete');


