<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('index',[PostController::class,'index'])->name('home');

Route::view('about','about')->name('about');
Route::view('/register','auth.register')->name('register');
Route::view('create_post','create_post')->middleware('auth')->name('create_post');
Route::view('contact','contact')->name('contact');
Route::view('login','login')->name('login');

Route::get('/{ad}',[PostController::class,'show']);

Route::post('login',[LoginController::class,'index'])->name('login_auth');    
Route::post('contact',[ContactController::class,'index'])->name('contact');

Route::post('/ads', [PostController::class, 'create'])->name('registro');
Route::post('/register',[RegisteredUserController::class,'store']);
