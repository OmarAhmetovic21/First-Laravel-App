<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index'); // home ostaje
});

Route::get('/about', function () {
    return view('aboutUs.aboutUs');
});

Route::get('/contact', function () {
    return view('contactUs.kontakt');
});

Route::get('/welcome', function () {
    return view('welcome.welcome');
});

// Ako koristiš kontroler:
Route::get('/posts', [PostController::class, 'index']);

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

