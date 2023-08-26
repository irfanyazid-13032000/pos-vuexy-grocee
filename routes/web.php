<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\RawController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CookController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BahanDasarController;
use App\Http\Controllers\FoodProcessController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\RecordBahanController;
use App\Http\Controllers\KategoriBahanController;
use App\Http\Controllers\ProsesProduksiController;
use App\Http\Controllers\WarehouseStockController;
use App\Http\Controllers\BahanTambahanProduksiController;
use App\Http\Controllers\KategoriProsesProduksiController;

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

Route::get('/cook/select-option/raw/{i}/{warehouse_id}',[CookController::class,'selectRaw'])->name('cook.select.raw');
Route::get('/cook/select-container/raw/{warehouse_id}',[CookController::class,'selectRawContainer'])->name('cook.select.container.raw');
Route::get('/cook/select-option/half-cooked/{i}',[CookController::class,'selectHalfCooked'])->name('cook.select.half.cooked');
Route::get('/cook/data-raw/{code}/{warehouse_id}',[CookController::class,'dataRaw'])->name('cook.data.raw');
 


Route::get('/outlet',[OutletController::class,'index'])->name('outlet.index');
Route::get('/outlet/create',[OutletController::class,'create'])->name('outlet.create');
Route::post('/outlet/store',[OutletController::class,'store'])->name('outlet.store');
Route::get('/outlet/edit/{id}',[OutletController::class,'edit'])->name('outlet.edit');
Route::post('/outlet/update/{id}',[OutletController::class,'update'])->name('outlet.update');
Route::get('/outlet/delete/{id}',[OutletController::class,'destroy'])->name('outlet.delete');


Route::get('/fendor',[VendorController::class,'index'])->name('vendor.index');
Route::get('/fendor/create',[VendorController::class,'create'])->name('vendor.create');
Route::post('/fendor/store',[VendorController::class,'store'])->name('vendor.store');
Route::get('/fendor/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');
Route::post('/fendor/update/{id}',[VendorController::class,'update'])->name('vendor.update');
Route::get('/fendor/delete/{id}',[VendorController::class,'destroy'])->name('vendor.destroy');


Route::get('/vurchase',[PurchaseController::class,'index'])->name('purchase.index');
Route::get('/vurchase/create',[PurchaseController::class,'create'])->name('purchase.create');
Route::post('/vurchase/store',[PurchaseController::class,'store'])->name('purchase.store');
Route::get('/vurchase/edit/{id}',[PurchaseController::class,'edit'])->name('purchase.edit');
Route::post('/vurchase/update/{id}',[PurchaseController::class,'update'])->name('purchase.update');
Route::get('/vurchase/delete/{id}',[PurchaseController::class,'destroy'])->name('purchase.delete');


Route::get('/food',[FoodController::class,'index'])->name('food.index');
Route::get('/food/create',[FoodController::class,'create'])->name('food.create');
Route::post('/food/store',[FoodController::class,'store'])->name('food.store');
Route::get('/food/edit/{id}',[FoodController::class,'edit'])->name('food.edit');
Route::post('/food/update/{id}',[FoodController::class,'update'])->name('food.update');
Route::get('/food/delete/{id}',[FoodController::class,'destroy'])->name('food.delete');
Route::get('/food/data/{id}',[FoodController::class,'foodData'])->name('food.data');


Route::get('/food-process/{id}',[FoodController::class,'foodProcess'])->name('food.process');
Route::get('/food-process/create/{id}',[FoodController::class,'foodProcessCreate'])->name('food.process.create');
Route::post('/food-process/store/{id}',[FoodController::class,'foodProcessStore'])->name('food.process.store');
Route::get('/food-process/edit/{id_food_process}',[FoodController::class,'foodProcessEdit'])->name('food.process.edit');
Route::post('/food-process/update/{id_food_process}',[FoodController::class,'foodProcessUpdate'])->name('food.process.update');
Route::get('/food-process/delete/{id_food_process}',[FoodController::class,'foodProcessDelete'])->name('food.process.delete');


Route::get('/food-process-daily/',[FoodProcessController::class,'index'])->name('food.process.daily');



Route::get('/kategori_bahan',[KategoriBahanController::class,'index'])->name('kategori.bahan.index');
Route::get('/kategori_bahan/create',[KategoriBahanController::class,'create'])->name('kategori.bahan.create');
Route::post('/kategori_bahan/store',[KategoriBahanController::class,'store'])->name('kategori.bahan.store');
Route::get('/kategori_bahan/edit/{id}',[KategoriBahanController::class,'edit'])->name('kategori.bahan.edit');
Route::post('/kategori_bahan/update/{id}',[KategoriBahanController::class,'update'])->name('kategori.bahan.update');
Route::get('/kategori_bahan/delete/{id}',[KategoriBahanController::class,'destroy'])->name('kategori.bahan.delete');



Route::get('/bahan_dasar',[BahanDasarController::class,'index'])->name('bahan.dasar.index');
Route::get('/bahan_dasar/create',[BahanDasarController::class,'create'])->name('bahan.dasar.create');
Route::post('/bahan_dasar/store',[BahanDasarController::class,'store'])->name('bahan.dasar.store');
Route::get('/bahan_dasar/edit/{id}',[BahanDasarController::class,'edit'])->name('bahan.dasar.edit');
Route::post('/bahan_dasar/update/{id}',[BahanDasarController::class,'update'])->name('bahan.dasar.update');
Route::get('/bahan_dasar/delete/{id}',[BahanDasarController::class,'destroy'])->name('bahan.dasar.delete');


Route::get('/bahan_tambahan_produksi',[BahanTambahanProduksiController::class,'index'])->name('bahan.tambahan.produksi.index');
Route::get('/bahan_tambahan_produksi/create',[BahanTambahanProduksiController::class,'create'])->name('bahan.tambahan.produksi.create');
Route::post('/bahan_tambahan_produksi/store',[BahanTambahanProduksiController::class,'store'])->name('bahan.tambahan.produksi.store');
Route::get('/bahan_tambahan_produksi/edit/{id}',[BahanTambahanProduksiController::class,'edit'])->name('bahan.tambahan.produksi.edit');
Route::post('/bahan_tambahan_produksi/update/{id}',[BahanTambahanProduksiController::class,'update'])->name('bahan.tambahan.produksi.update');
Route::get('/bahan_tambahan_produksi/delete/{id}',[BahanTambahanProduksiController::class,'destroy'])->name('bahan.tambahan.produksi.delete');
Route::get('/bahan_data/{id}',[BahanDasarController::class,'dataBahanDasar'])->name('data.bahan.dasar');




Route::get('/satuan',[SatuanController::class,'index'])->name('satuan.index');
Route::get('/satuan/create',[SatuanController::class,'create'])->name('satuan.create');
Route::post('/satuan/store',[SatuanController::class,'store'])->name('satuan.store');
Route::get('/satuan/edit/{id}',[SatuanController::class,'edit'])->name('satuan.edit');
Route::post('/satuan/update/{id}',[SatuanController::class,'update'])->name('satuan.update');
Route::get('/satuan/delete/{id}',[SatuanController::class,'destroy'])->name('satuan.delete');



Route::get('/kategori_proses_produksi',[KategoriProsesProduksiController::class,'index'])->name('kategori.proses.produksi.index');
Route::get('/kategori_proses_produksi/create',[KategoriProsesProduksiController::class,'create'])->name('kategori.proses.produksi.create');
Route::post('/kategori_proses_produksi/store',[KategoriProsesProduksiController::class,'store'])->name('kategori.proses.produksi.store');
Route::get('/kategori_proses_produksi/edit/{id}',[KategoriProsesProduksiController::class,'edit'])->name('kategori.proses.produksi.edit');
Route::post('/kategori_proses_produksi/update/{id}',[KategoriProsesProduksiController::class,'update'])->name('kategori.proses.produksi.update');
Route::get('/kategori_proses_produksi/delete/{id}',[KategoriProsesProduksiController::class,'destroy'])->name('kategori.proses.produksi.delete');



Route::get('/proses_produksi',[ProsesProduksiController::class,'index'])->name('proses.produksi.index');
Route::get('/proses_produksi/create',[ProsesProduksiController::class,'create'])->name('proses.produksi.create');
Route::post('/proses_produksi/store',[ProsesProduksiController::class,'store'])->name('proses.produksi.store');
Route::get('/proses_produksi/delete/{id}',[ProsesProduksiController::class,'destroy'])->name('proses.produksi.delete');
Route::get('/proses_produksi/edit/{id}',[ProsesProduksiController::class,'edit'])->name('proses.produksi.edit');
Route::post('/proses_produksi/update/{id}',[ProsesProduksiController::class,'update'])->name('proses.produksi.update');
Route::get('/proses_produksi/rincian_resep/{id}/{qty}',[ProsesProduksiController::class,'rincianResep'])->name('proses.produksi.rincian.resep');
Route::get('/proses_produksi/stock_purchase/{id}/{qty}/{warehouse_id}',[ProsesProduksiController::class,'stockPurchase'])->name('proses.produksi.stock.purchase');





Route::get('/record_bahan',[RecordBahanController::class,'index'])->name('record.bahan.index');
Route::post('/record_bahan/data',[RecordBahanController::class,'data'])->name('record.bahan.data');