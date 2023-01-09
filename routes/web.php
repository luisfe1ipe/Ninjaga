<?php

use App\Http\Controllers\AuthorController;
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


Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/create', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/edit/{id}', [AuthorController::class, 'update'])->name('author.update');