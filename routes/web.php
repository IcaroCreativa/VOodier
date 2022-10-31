<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('forgot_password', [PasswordResetLinkController::class, 'create'])
 ->name('password.request');
Route::post('forgot_password', [PasswordResetLinkController::class, 'store'])
 ->name('password.email'); 

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
 ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
 ->name('password.update');

Route::get('/', [IndexController::class,'index']);
Route::get('index',[PostController::class,'index'])->name('home');

Route::view('about','about')->name('about');
Route::view('/register','auth.register')->name('register');

Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::view('create_post','create_post')->middleware('auth')->name('create_post');
Route::view('contact','contact')->name('contact');


Route::get('/{ad}',[PostController::class,'show']);
Route::post('contact',[ContactController::class,'store'])->name('contact');

Route::post('/ads', [PostController::class, 'create'])->name('registro');
Route::post('/register',[RegisteredUserController::class,'store']);




 