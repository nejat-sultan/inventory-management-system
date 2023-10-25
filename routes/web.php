<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get("/dashboard", [DashboardController::class, 'dashboard']);

Route::resource("/supplier", SupplierController::class);
Route::get("/searchsupplier", [SupplierController::class, 'searchsupplier']);

Route::resource("/customer", CustomerController::class);
Route::get("/searchcustomer", [CustomerController::class, 'searchcustomer']);

Route::resource("/unit", UnitController::class);
Route::get("/searchunit", [UnitController::class, 'searchunit']);

Route::resource("/category", CategoryController::class);
Route::get("/searchcategory", [CategoryController::class, 'searchcategory']);

Route::resource("/product", ProductController::class);
Route::get("/searchproduct", [ProductController::class, 'searchproduct']);
Route::get("/stock/stockreport", [ProductController::class, 'stockreport']);
Route::get("/prnpriview", [ProductController::class, 'prnpriview']);

Route::resource("/purchase", PurchaseController::class);
Route::get("/searchpurchase", [PurchaseController::class, 'searchpurchase']);
Route::get("/purchasereport", [PurchaseController::class, 'purchasereport']);

Route::resource("/sales", SalesController::class);
Route::get("/searchsales", [SalesController::class, 'searchsales']);
Route::get("/salesreport", [SalesController::class, 'salesreport']);
