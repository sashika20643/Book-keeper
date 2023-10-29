<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Admin.home');
Route::get('admin/books', [BookController::class, 'Home'])->name('Admin.books.home');
Route::get('admin/books/create', [BookController::class, 'create'])->name('Admin.books.create');
Route::post('/books', [BookController::class, 'store'])->name('Admin.books.store');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('Admin.books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('Admin.books.update');
Route::delete('/books/{id}', [BookController::class, 'delete'])->name('Admin.books.delete');

