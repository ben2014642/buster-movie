<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/admin',[AdminController::class,'index']);

Route::prefix('admin')->name('admin.')->group(function ()
{
    Route::resource('/genre',GenreController::class);
    Route::resource('/country',CountryController::class);
    Route::resource('/celebrity',CelebrityController::class);
    Route::resource('/movie',MovieController::class);
});

// Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/movie ', [IndexController::class, 'movie'])->name('movie');

