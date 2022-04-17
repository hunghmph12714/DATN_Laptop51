<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('lop')->group(function () {

    Route::get('/', [ClassController::class, 'index'])->name('lop_hoc.index');
    Route::get('/add', [ClassController::class, 'addForm'])->name('lop_hoc.add');
    Route::post('/add', [ClassController::class, 'saveAdd']);
    Route::get('/edit/{id}', [ClassController::class, 'editForm'])->name('lop_hoc.edit');
    Route::post('/edit/{id}', [ClassController::class, 'saveEdit']);
    Route::get('/remove/{id}', [ClassController::class, 'remove'])->name('lop_hoc.remove');
});
Route::prefix('hoc-sinh')->group(function () {

    Route::get('/', [StudentController::class, 'index'])->name('hoc_sinh.index');
    Route::get('/add', [StudentController::class, 'addForm'])->name('hoc_sinh.add');
    Route::post('/add', [StudentController::class, 'saveAdd']);
    Route::get('/edit/{id}', [StudentController::class, 'editForm'])->name('hoc_sinh.edit');
    Route::post('/edit/{id}', [StudentController::class, 'saveEdit']);
    Route::get('/remove/{id}', [StudentController::class, 'remove'])->name('hoc_sinh.remove');
});
