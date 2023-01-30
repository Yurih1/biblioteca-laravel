<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;


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
    return view('index');
});

// routes for books
Route::get('/books/create', [BooksController::class, 'create']);
Route::post('/books/save', [BooksController::class, 'store']);
Route::get('/books/reserve/{id}', [BooksController::class, 'show']);
Route::post('/books/reserving/{id}', [BooksController::class, 'update']);
Route::get('books/edit/{id}', [BooksController::class, 'show']);
Route::get('/books/delete/{id}', [BooksController::class, 'destroy']);
Route::post('/books/edit/{id}', [BooksController::class, 'edit']);

// routes for users
Route::get('/users/create', [UsersController::class, 'create']);
Route::post('/users/save', [UsersController::class, 'store']);
Route::get('/users/view-detail/{id}', [UsersController::class , 'show']);
Route::post('users/edit/{id}', [UsersController::class, 'update']);
Route::get('/users/delete/{id}', [UsersController::class, 'destroy']);
