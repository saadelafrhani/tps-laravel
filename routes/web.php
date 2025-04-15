<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/init-posts', [PostController::class, 'initPosts']);

Route::view('/', [PostController::class, 'home']);

//Cruddd
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->where('id', '[0-9]+');
Route::put('/posts/{id}', [PostController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+');


Route::view('/about', 'about');
Route::view('/contact', 'contact');
