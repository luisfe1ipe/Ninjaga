<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Project\{
    ProjectShow,
};
use App\Http\Livewire\Chapter\{
    ChapterShow,
};
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


Route::get('/', Home::class)->name('home');
Route::get('/project/{id}', ProjectShow::class)->name('project.show');
Route::get('/project/{id}/chapter/{chapterId}', ChapterShow::class)->name('chapter.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
