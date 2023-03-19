<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('verifyAdminLogin')->prefix('admin')->name('admin.')->group(function ()
{
    Route::get('/',[AdminController::class,'index']);
    Route::resource('/genre',GenreController::class);
    Route::resource('/country',CountryController::class);
    Route::resource('/celebrity',CelebrityController::class);
    Route::resource('/movie',MovieController::class);
});

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/movie', [IndexController::class, 'movie'])->name('movie');
Route::get('/movie/{slug}', [IndexController::class, 'view_movie'])->name('movie.view');
Route::get('/movie/{id}/{star}', [IndexController::class, 'rateMovie'])->name('movie.rate');
Route::post('/movie/search', [IndexController::class, 'search'])->name('movie.search');

Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/processUpload', [UploadController::class, 'processUpload'])->name('upload.process');
