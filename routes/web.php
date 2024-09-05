<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('/users', [UserController::class,'index']);

Route::get('/user/add', [UserController::class,'create']);
Route::post('/user/add',[UserController::class,'store'])->name('store');

Route::get('/user/edit/{id}',[UserController::class,'editForm']);
Route::post('/user/edit',[UserController::class, 'edit'])->name('edit');

Route::get('/user/delete/{id}', [UserController::class, 'delete']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();