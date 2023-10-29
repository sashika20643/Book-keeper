<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\BookIssuanceController;

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

Route::middleware([
    'auth',

])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->middleware([
        'isAdmin'
      ])->group(function () {

        //---------------Handle books------------------
Route::get('books', [BookController::class, 'Home'])->name('Admin.books.home');
Route::get('books/create', [BookController::class, 'create'])->name('Admin.books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('Admin.books.store');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('Admin.books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('Admin.books.update');
Route::delete('/books/{id}', [BookController::class, 'delete'])->name('Admin.books.delete');

       //---------------Handle Issue------------------
Route::get('/book-issuances/create', [BookIssuanceController::class, 'create'])->name('book-issuances.create');
      });
});
