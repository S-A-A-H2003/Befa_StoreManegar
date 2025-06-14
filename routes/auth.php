<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;



Route::get('/admin/category/trash' , [CategoryController::class , 'trash'])->name('category.trash');
Route::put('/admin/category/restore' , [CategoryController::class , 'restore'])->name('category.restore');
Route::delete('/admin/category/forceDelete' , [CategoryController::class , 'forceDelete'])->name('category.forceDelete');

Route::get('/admin/product/trash' , [productController::class , 'trash'])->name('product.trash');
Route::put('/admin/product/restore' , [productController::class , 'restore'])->name('product.restore');
Route::delete('/admin/product/forceDelete' , [productController::class , 'forceDelete'])->name('product.forceDelete');

Route::get('/setting' , [SettingController::class , 'edit'])->name('setting.edit');
Route::put('/setting' , [SettingController::class , 'update'])->name('setting.update');
Route::delete('/setting/default' , [SettingController::class , 'default'])->name('setting.default');


Route::put('/information' , [InformationController::class , 'update'])->name('information.update');

Route::get('/log' , [LogController::class , 'index'])->name('log.index');

Route::get('/customer' , [CustomerController::class , 'index'])->name('customer.index');
Route::get('/customer/{user}' , [CustomerController::class , 'show'])->name('customer.show');




Route::prefix('/admin')->group(function () {
    Route::resources([
        '/product'  => ProductController::class,
        '/category' => CategoryController::class,
    ]);
});
