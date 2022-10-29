<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;



Route::view('about','about')->name('about');
Route::view('register','register')->name('register');
Route::view('ad','ad')->name('ad');

Route::get('login',function () {
    return view('login');
    })->name('login');
Route::post('login',[LoginController::class,'send'])->name('login');

Route::get('contact',function () {
    return view('contact');
    })->name('contact');
    
Route::post('contact',[ContactController::class,'send'])->name('contact');
Route::get('index',[PostController::class,'index'])->name('home');
Route::get('create_post',[CategoryController::class,'index'])->name('create_post');

