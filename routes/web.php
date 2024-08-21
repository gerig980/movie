<?php

use App\Http\Controllers\MovieApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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



Route::get('/', [PostController::class, 'index']);
Route::get('/movie', [PostController::class, 'filter'])->name('filter.category');
Route::get('/movie/{id}', [PostController::class, 'show'])->name('movie.single');
// Route::apiResource('/movies', [MovieApiController::class]);


Route::get('/movies', [MovieApiController::class,'store']);