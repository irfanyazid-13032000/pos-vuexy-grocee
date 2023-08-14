<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\IngredientsController;

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

Route::get('/pos',[PosController::class,'index'])->name('pos.index');


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

// warehouse
Route::get('/warehouse',[WarehouseController::class,'index'])->name('warehouse.index');
Route::get('/warehouse/create',[WarehouseController::class,'create'])->name('warehouse.create');
Route::post('/warehouse/store',[WarehouseController::class,'store'])->name('warehouse.store');
Route::get('/warehouse/{id}/edit',[WarehouseController::class,'edit'])->name('warehouse.edit');
Route::post('/warehouse/{id}/update',[WarehouseController::class,'update'])->name('warehouse.update');
Route::get('/warehouse/{id}/delete',[WarehouseController::class,'destroy'])->name('warehouse.delete');

// item
Route::get('/item',[ItemController::class,'index'])->name('item.index');
Route::get('/item/create',[ItemController::class,'create'])->name('item.create');
Route::post('/item/store',[ItemController::class,'store'])->name('item.store');
Route::get('/item/{id}/edit',[ItemController::class,'edit'])->name('item.edit');
Route::post('/item/{id}/update',[ItemController::class,'update'])->name('item.update');
Route::get('/item/{id}/delete',[ItemController::class,'destroy'])->name('item.delete');

// ingredient
Route::get('/ingredient/{code}',[IngredientsController::class,'index'])->name('ingredient.index');
Route::get('/ingredient/{code}/data',[IngredientsController::class,'ingredientsData'])->name('ingredient.data');
Route::get('/ingredient/{code}/store',[IngredientsController::class,'store'])->name('ingredient.store');
Route::get('/ingredient/{code}/{id}/edit',[IngredientsController::class,'edit'])->name('ingredient.edit');
Route::get('/ingredient/{code}/{id}/update',[IngredientsController::class,'update'])->name('ingredient.update');
Route::get('/ingredient/{code}/{id}/delete',[IngredientsController::class,'destroy'])->name('ingredient.delete');


// cart
Route::get('/insert-cart/{id}',[CartController::class,'insert'])->name('cart.insert');
Route::get('/remove-cart/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/checkout-cart',[CartController::class,'checkout'])->name('cart.checkout');


// receipt
Route::get('/receipt-print/{receipt_no}',[ReceiptController::class,'print'])->name('receipt.print');
Route::post('/receipt-create',[ReceiptController::class,'create'])->name('create.receipt');





