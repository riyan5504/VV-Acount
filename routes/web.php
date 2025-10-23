<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductionController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SettingController;
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


//Purchase...........
Route::get('/purchase/create', [PurchaseController::class, 'itemPurchase']);
Route::get('/purchase/purchase-entry', [PurchaseController::class, 'purchaseEntry']);
Route::get('/purchase/purchase-vendor-entry', [PurchaseController::class, 'purchaseVendorEntry']);
Route::get('/purchase/purchase-return-entry', [PurchaseController::class, 'purchaseReturnEntry']);


//Manufactur............

Route::get('/production', [ProductionController::class, 'production']);
Route::get('/production/product/add', [ProductionController::class, 'productAdd']);
Route::post('/production/product/store', [ProductionController::class, 'productStore']);
