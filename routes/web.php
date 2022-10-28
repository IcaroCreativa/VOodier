<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::view('index','index')->name('home');
Route::view('ad','ad')->name('ad');
Route::get('create_post',[CategoryController::class,'index'])->name('create_post');
Route::view('about','about')->name('about');
Route::view('contact','contact')->name('contact');
Route::view('register','register')->name('register');
Route::view('login','login')->name('login');