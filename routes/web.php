<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\RawController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CookController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\WarehouseStockController;

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
Route::get('/pos/cart',[PosController::class,'cart'])->name('pos.cart');
Route::get('/pos/total-amount',[PosController::class,'totalAmount'])->name('pos.total.amount');
Route::get('/pos/items-count',[PosController::class,'itemsCount'])->name('pos.items.count');
Route::get('/pos/products',[PosController::class,'products'])->name('pos.products');
Route::get('/pos/products-by-category/{category_id}',[PosController::class,'productsByCategory'])->name('pos.products.by.category');
Route::get('/pos/category',[PosController::class,'category'])->name('pos.category');
Route::post('/pos/struk',[PosController::class,'struk'])->name('pos.struk');


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

Route::get('/warehouse/makanan-pokok/{i}',[WarehouseController::class,'makananPokok'])->name('warehouse.makanan.pokok');

// warehouse stock
Route::get('/warehouse-stock/{id_warehouse}',[WarehouseStockController::class,'index'])->name('warehouse.stock.index');
Route::get('/warehouse-stock/{id_warehouse}/create',[WarehouseStockController::class,'create'])->name('warehouse.stock.create');
Route::post('/warehouse-stock/{id_warehouse}/store',[WarehouseStockController::class,'store'])->name('warehouse.stock.store');
Route::get('/warehouse-stock/{id_warehouse}/delete/{stock_id}',[WarehouseStockController::class,'destroy'])->name('warehouse.stock.delete');
Route::get('/warehouse-stock/{id_warehouse}/edit/{stock_id}',[WarehouseStockController::class,'edit'])->name('warehouse.stock.edit');


Route::get('/warehouse-stock/{id_warehouse}/raw/',[WarehouseStockController::class,'raw'])->name('warehouse.stock.raw');
Route::get('/warehouse-stock/{id_warehouse}/raw-datatable/',[WarehouseStockController::class,'rawDatatable'])->name('warehouse.stock.raw.datatable');
Route::get('/warehouse-stock/{id_warehouse}/raw-create/',[WarehouseStockController::class,'rawCreate'])->name('warehouse.stock.raw.create');
Route::post('/warehouse-stock/{id_warehouse}/raw-store/',[WarehouseStockController::class,'rawStore'])->name('warehouse.stock.raw.store');
Route::get('/warehouse-stock/{id_warehouse}/{kode_bahan}/raw-edit/',[WarehouseStockController::class,'rawEdit'])->name('warehouse.stock.raw.edit');
Route::post('/warehouse-stock/{id_warehouse}/{kode_bahan}/raw-update/',[WarehouseStockController::class,'rawUpdate'])->name('warehouse.stock.raw.update');
Route::get('/warehouse-stock/{id_warehouse}/{kode_bahan}/raw-delete/',[WarehouseStockController::class,'rawDelete'])->name('warehouse.stock.raw.delete');


Route::get('/warehouse-stock/{id_warehouse}/half-cooked/',[WarehouseStockController::class,'halfCooked'])->name('warehouse.stock.half.cooked');
Route::get('/warehouse-stock/{id_warehouse}/half-cooked-datatable/',[WarehouseStockController::class,'halfCookedDatatable'])->name('warehouse.stock.half.cooked.datatable');

Route::post('/warehouse-stock/{id_warehouse}/update/{stock_id}',[WarehouseStockController::class,'update'])->name('warehouse.stock.update');
Route::get('/warehouse-stock/{code}/data',[WarehouseStockController::class,'warehouseData'])->name('stock.warehouse.data');


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
Route::get('/ingredient/{code}/create',[IngredientsController::class,'create'])->name('ingredient.create');
Route::post('/ingredient/{code}/store',[IngredientsController::class,'store'])->name('ingredient.store');
Route::get('/ingredient/{code}/edit/{id}',[IngredientsController::class,'edit'])->name('ingredient.edit');
Route::post('/ingredient/{id}/update',[IngredientsController::class,'update'])->name('ingredient.update');
Route::get('/ingredient/{code}/{id}/delete',[IngredientsController::class,'destroy'])->name('ingredient.delete');


// cart
Route::get('/insert-cart/{id}',[CartController::class,'insert'])->name('cart.insert');
Route::get('/remove-cart/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/checkout-cart',[CartController::class,'checkout'])->name('cart.checkout');
Route::get('/increase-qty-cart/{id}',[CartController::class,'increase'])->name('increase.cart');
Route::get('/decrease-qty-cart/{id}',[CartController::class,'decrease'])->name('decrease.cart');


// receipt
Route::get('/receipt-print/{receipt_no}',[ReceiptController::class,'print'])->name('receipt.print');
Route::post('/receipt-create',[ReceiptController::class,'create'])->name('create.receipt');



Route::get('/raw',[RawController::class,'index'])->name('raw.index');
Route::get('/raw/{id}/{warehouse_id}/edit',[RawController::class,'edit'])->name('raw.edit');
Route::post('/raw-datatable',[RawController::class,'rawDatatable'])->name('raw.datatable');





Route::get('/bahan-baku',[BahanBakuController::class,'index'])->name('bahan.baku.index');
Route::get('/bahan-baku/create',[BahanBakuController::class,'create'])->name('bahan.baku.create');
Route::post('/bahan-baku/store',[BahanBakuController::class,'store'])->name('bahan.baku.store');
Route::get('/bahan-baku-datatable',[BahanBakuController::class,'bahanBakuDatatable'])->name('bahan.baku.datatable');
Route::get('/bahan-baku/{id}/edit',[BahanBakuController::class,'edit'])->name('bahan.baku.edit');
Route::post('/bahan-baku/{id}/update',[BahanBakuController::class,'update'])->name('bahan.baku.update');
Route::get('/bahan-baku/{id}/delete',[BahanBakuController::class,'destroy'])->name('bahan.baku.delete');



Route::get('/cook-record',[CookController::class,'cookRecord'])->name('cook.record');
Route::get('/cook/detail/{no_reference_cook}',[CookController::class,'cookDetail'])->name('cook.detail');
Route::get('/cook-process',[CookController::class,'cookProcess'])->name('cook.process');
Route::get('/cook-process/raw-to-semi',[CookController::class,'rawToSemi'])->name('cook.process.raw.to.semi');
Route::post('/cook-process/raw-to-semi/store',[CookController::class,'rawToSemiStore'])->name('cook.process.raw.to.semi.store');

Route::get('/cook/select-option/raw/{i}',[CookController::class,'selectRaw'])->name('cook.select.raw');
Route::get('/cook/select-option/half-cooked/{i}',[CookController::class,'selectHalfCooked'])->name('cook.select.half.cooked');

Route::get('/cook/data-raw/{code}/{warehouse_id}',[CookController::class,'dataRaw'])->name('cook.data.raw');
 