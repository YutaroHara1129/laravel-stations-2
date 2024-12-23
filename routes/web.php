<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;

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

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);

Route::get('/getPractice', [PracticeController::class, 'getPractice']);

Route::get('/movies', [MovieController::class, 'index'])->name('movies');

Route::get('/admin/movies', [MovieController::class, 'getMovies'])->name('movies.index');
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'destroyMovie'])->name('movies.destroy');
Route::get('/admin/movies/create', [MovieController::class, 'getCreateMovie'])->name('movies.create');
Route::post('/admin/movies/store', [MovieController::class, 'storeMovie'])->name('movies.store');
Route::get('/admin/movies/{id}/edit', [MovieController::class, 'getEditMovie'])->name('movies.edit');
Route::patch('/admin/movies/{id}/update', [MovieController::class, 'updateMovie'])->name('movies.update');
