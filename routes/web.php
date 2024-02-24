<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'dashboard'])->name('dashboard');

// Supplier
Route::get('/add_supplier', [SupplierController::class, 'add'])->name('add.supplier');
Route::get('/edit_supplier{id}', [SupplierController::class, 'edit'])->name('edit.supplier');
Route::post('/update_supplier{id}', [SupplierController::class, 'update'])->name('update.supplier');
Route::post('/form_supplier', [SupplierController::class, 'store'])->name('store.supplier');
Route::get('/delete_supplier{id}', [SupplierController::class, 'delete'])->name('delete.supplier');

// Brand
Route::get('/add_brand', [BrandController::class, 'add'])->name('add.brand');
Route::get('/edit_brand{id}', [BrandController::class, 'edit'])->name('edit.brand');
Route::post('/update_brand{id}', [BrandController::class, 'update'])->name('update.brand');
Route::post('/form_brand', [BrandController::class, 'store'])->name('store.brand');
Route::get('/delete_brand{id}', [BrandController::class, 'delete'])->name('delete.brand');

// Item
Route::get('/add_item', [ItemController::class, 'add'])->name('add.item');
Route::get('/edit_item{id}', [ItemController::class, 'edit'])->name('edit.item');
Route::post('/update_item{id}', [ItemController::class, 'update'])->name('update.item');
Route::post('/form_item', [ItemController::class, 'store'])->name('store.item');
Route::get('/delete_item{id}', [ItemController::class, 'delete'])->name('delete.item');

// Inventory
Route::get('/add_inventory', [InventoryController::class, 'add'])->name('add.inventory');
Route::get('/edit_inventory{id}', [InventoryController::class, 'edit'])->name('edit.inventory');
Route::post('/update_inventory{id}', [InventoryController::class, 'update'])->name('update.inventory');
Route::post('/form_inventory', [InventoryController::class, 'store'])->name('store.inventory');
Route::get('/delete_inventory{id}', [InventoryController::class, 'delete'])->name('delete.inventory');
Route::post('/release-stock/{id}', [InventoryController::class, 'releaseStock'])->name('product.release-stock');
Route::post('/add-stock/{id}', [InventoryController::class, 'addStock'])->name('product.add-stock');

// Stocks
Route::get('/add_stock', [StockController::class, 'add'])->name('add.stock');
Route::get('/edit_stock{id}', [StockController::class, 'edit'])->name('edit.stock');
Route::post('/update_stock{id}', [StockController::class, 'update'])->name('update.stock');
Route::post('/form_stock', [StockController::class, 'store'])->name('store.stock');
Route::get('/delete_stock{id}', [StockController::class, 'delete'])->name('delete.stock');
Route::get('/release_stock{id}', [StockController::class, 'release'])->name('release.stock');

Route::middleware(['check_admin_access'])->group(function () {
    Route::get('/users', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/brands', [BrandController::class, 'brand'])->name('brands.admin');
    Route::get('/items', [ItemController::class, 'brand'])->name('items.admin');
    Route::get('/suppliers', [SupplierController::class, 'supplier'])->name('suppliers.admin');
    Route::get('/inventories', [InventoryController::class, 'inventory'])->name('inventories.admin');
    Route::get('/stocks', [StockController::class, 'stock'])->name('stocks.admin');
    Route::get('/qrcode', [QrCodeController::class, 'showQR'])->name('qrcode');
});
