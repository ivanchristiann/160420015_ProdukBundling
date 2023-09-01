<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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
    return view('layout.dashboard');
});

Route::resource('product', ProductController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('supplier', SupplierController::class);

Route::post('product/aktifkan', [ProductController::class, 'aktifkan'])->name('product.aktifkan');
Route::post('product/nonaktifkan', [ProductController::class, 'nonaktifkan'])->name('product.nonaktifkan');

Route::post('supplier/aktifkan', [SupplierController::class, 'aktifkan'])->name('supplier.aktifkan');
Route::post('supplier/nonaktifkan', [SupplierController::class, 'nonaktifkan'])->name('supplier.nonaktifkan');

Route::post('employee/aktifkan', [EmployeeController::class, 'aktifkan'])->name('employee.aktifkan');
Route::post('employee/nonaktifkan', [EmployeeController::class, 'nonaktifkan'])->name('employee.nonaktifkan');
