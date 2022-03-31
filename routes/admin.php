<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Categories_newsController;

use Illuminate\Support\Facades\Route;

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

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/remove/{id}', [CategoryController::class, 'remove'])->name('category.remove');
    Route::get('add', [CategoryController::class, 'addForm'])->name('category.add');
    Route::post('add', [CategoryController::class, 'saveAdd']);
    Route::get('edit/{id}', [CategoryController::class, 'editForm'])->name('category.edit');
    Route::post('edit/{id}', [CategoryController::class, 'saveEdit']);
    Route::get('detail/{id}', [CategoryController::class, 'detail']);
});
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/remove/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::get('add', [ProductController::class, 'addForm'])->name('product.add');
    Route::post('add', [ProductController::class, 'saveAdd']);
    Route::get('edit/{id}', [ProductController::class, 'editForm'])->name('product.edit');
    Route::post('edit/{id}', [ProductController::class, 'saveEdit']);
    Route::get('detail/{id}', [ProductController::class, 'detail']);
});
Route::prefix('detail-product')->group(function () {
    Route::get('/', [DetailProductController::class, 'index'])->name('detail-product.index');
    Route::get('/remove/{id}', [DetailProductController::class, 'remove'])->name('detail-product.remove');
    Route::get('add', [DetailProductController::class, 'addForm'])->name('detail-product.add');
    Route::post('add', [DetailProductController::class, 'saveAdd']);
    Route::get('edit/{id}', [DetailProductController::class, 'editForm'])->name('detail-product.edit');
    Route::post('edit/{id}', [DetailProductController::class, 'saveEdit']);
    Route::get('detail/{id}', [DetailProductController::class, 'detail']);
});
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
});
Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('register');
});
Route::prefix('dat-lich')->group(function () {
    Route::get('/', [BookingController::class, 'listBooking'])->name('dat-lich.index');
    Route::get('/danh-sach-may', [BookingController::class, 'listBookingDetail'])->name('dat-lich.danh-sach-may');

    Route::get('tao-moi', [BookingController::class, 'formCreateBooking'])->name('dat-lich.add');
    Route::post('tao-moi', [BookingController::class, 'creatBooking']);
    Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
    Route::post('sua/{id}', [BookingController::class, 'editBooking']);
    Route::get('xoa/{id}', [BookingController::class, 'deleteBooking'])->name('dat-lich.delete');
});
Route::prefix('sua-chua')->group(function () {
    Route::get('/{id}', [BookingController::class, 'repairDetail'])->name('suachua.get');
});
Route::prefix('lien-he')->group(function(){
    Route::get('/',[ContactController::class, 'index'])->name('contact.index');
});

////////////////////// Tin tức
Route::prefix('tin-tuc')->group(function(){
    //list
    Route::get('/',[NewsController::class, 'index'])->name('news.index');

    //add
    Route::get('/add',[NewsController::class, 'add'])->name('news.add');
    Route::post('/add',[NewsController::class, 'save_add']);

    //edit
    Route::get('/edit/{id}',[NewsController::class, 'edit'])->name('news.edit');
    Route::post('/edit/{id}',[NewsController::class, 'save_edit']);
    
    //remove
    Route::get('/delete/{id}',[NewsController::class, 'remove'])->name('news.remove');
});
Route::prefix('danh-muc-tin-tuc')->group(function(){
    //list
    Route::get('/',[Categories_newsController::class, 'index'])->name('category_news.index');

    //add
    Route::get('/add',[Categories_newsController::class, 'add'])->name('category_news.add');
    Route::post('/add',[Categories_newsController::class, 'save_add']);

    //edit
    Route::get('/edit/{id}',[Categories_newsController::class, 'edit'])->name('category_news.edit');
    Route::post('/edit/{id}',[Categories_newsController::class, 'save_edit']);
    
    //remove
    Route::get('/delete/{id}',[Categories_newsController::class, 'remove'])->name('category_news.remove');
});