<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductionController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/admin/login', [AdminAuthController::class, 'adminLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'adminLogoutForm']);

Auth::routes();

Route::get('/dashboard', [AdminController::class, 'adminDashboard']);
//settings routes............
Route::get('/settings', [SettingController::class, 'adminSettings']);

//Item...........
Route::get('/settings/items-entry', [SettingController::class, 'settingsItemEntry']);
Route::post('/items-entry/save', [SettingController::class, 'saveItemEntry']);
Route::get('/items-entry/edit/{id}', [SettingController::class, 'editItemEntry']);
Route::post('/items-entry/update/{id}', [SettingController::class, 'updateItemEntry']);
Route::get('/items-entry/delete/{id}', [SettingController::class, 'deleteItemEntry']);

//Category.........
Route::get('/settings/category-entry', [SettingController::class, 'settingsCategoryEntry']);
Route::post('/category/save', [SettingController::class, 'settingsCategorySave']);
Route::get('/category/edit/{id}', [SettingController::class, 'settingsCategoryEdit']);
Route::post('/category/update/{id}', [SettingController::class, 'settingsCategoryUpdate']);
Route::get('/category/delete/{id}', [SettingController::class, 'settingsCategoryDelete']);

//search..........
Route::get('/vendor/search', [VendorController::class, 'search'])->name('vendor.search');
Route::get('/item/search', [VendorController::class, 'searchItem'])->name('item.search');
Route::get('/category/search', [VendorController::class, 'searchCategory'])->name('category.search');


//Purchase...........
Route::get('/purchase', [PurchaseController::class, 'itemPurchase']);
Route::get('/purchase/create', [PurchaseController::class, 'createPurchase']);
Route::post('/purchase/store', [PurchaseController::class, 'purchaseStore']);
Route::get('/purchase/purchase-vendor-entry', [PurchaseController::class, 'purchaseVendorEntry']);
Route::get('/purchase/purchase-return-entry', [PurchaseController::class, 'purchaseReturnEntry']);


//Manufactur............

Route::get('/production', [ProductionController::class, 'production']);
Route::get('/production/product/add', [ProductionController::class, 'productAdd']);
Route::post('/production/product/store', [ProductionController::class, 'productStore']);
Route::get('/production/list', [ProductionController::class, 'productionList']);
Route::get('/production/edit/{id}', [ProductionController::class, 'productionEdit']);
Route::get('/production/delete/{id}', [ProductionController::class, 'productionDelete']);
Route::post('/production/update/{id}', [ProductionController::class, 'productionUpdate']);
