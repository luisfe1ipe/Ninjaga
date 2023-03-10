<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Project\ChapterController;
use App\Http\Controllers\Project\SaveController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProjectController::class, 'index']);


Route::get('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/login', [LoginController::class, 'auth'])->name('user.auth');
Route::get('/register', [RegisterController::class, 'create'])->name('user.create');
Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
Route::get('/logout', [LogoutController::class, 'logout'])->name('user.logout');

Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.show');

// AUTHOR
Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/create/{modal?}', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/edit/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::get('/author/{id}', [AuthorController::class, 'show'])->name('author.show');
Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');

// ARTIST
Route::get('/artists', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist/create/{modal?}', [ArtistController::class, 'store'])->name('artist.store');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])->name('artist.edit');
Route::put('/artist/edit/{id}', [ArtistController::class, 'update'])->name('artist.update');
Route::get('/artist/{id}', [ArtistController::class, 'show'])->name('artist.show');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])->name('artist.destroy');

//STUDIO
Route::post('/studio/create/{modal?}', [StudioController::class, 'store'])->name('studio.store');

// PROJECT
Route::get('/{type?}', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/project/create', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/edit/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('/project/list/genres/{genre}', [ProjectController::class, 'indexByGenre'])->name('project.indexByGenre');
Route::get('/projects/list/releaseds/{released}', [ProjectController::class, 'indexByReleased'])->name('project.indexByReleased');

// SAVE
Route::get('/projects/save/{type}', [SaveController::class, 'index'])->name('save.index');

// CHAPTER
Route::get('project/{id}/create-chapter', [ChapterController::class, 'create'])->name('chapter.create');
Route::post('project/{id}/create-chapter', [ChapterController::class, 'store'])->name('chapter.store');
Route::get('project/{id}/chapters/{chapter_id}', [ChapterController::class, 'show'])->name('chapter.show');
Route::delete('project/{id}/chapters/{chapter_id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');

Route::post('genre/create/{modal?}', [GenreController::class, 'store'])->name('genre.store');