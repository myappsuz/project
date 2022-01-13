<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('admin_element/product');
// });
// Route::get('/hi', function () {
//     return view('admin/admin');
// });
// Route::get('/addi',[AuthController::class,"addi"]);

Route::get('/logout',[AuthController::class,"logout"]);
Route::get('/admin',[AuthController::class,"admin_login"])->name("login");
Route::post('/admin',[AuthController::class,"admin_login_check"]);


Route::get('/admin/product',[PageController::class,"admin_product"])->middleware('auth');
Route::get('/add',[PageController::class,"admin_product_add"])->middleware('auth');
Route::post('/add',[PageController::class,"admin_product_add_create"])->middleware('auth');





Route::get('/',[PageController::class,"index"]);


Route::get('/edit/{id}',[PageController::class,"admin_product_edit"])->middleware('auth');
Route::post('/edit/{id}',[PageController::class,"admin_product_edit_update"])->middleware('auth');



Route::get('/delete/{id}',[PageController::class,"admin_product_delete"])->middleware('auth');
