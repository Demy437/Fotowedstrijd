<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// =============== navbar pages start =====================
Route::get('/', function () {
    return view('index');
});
Route::get('/fotos', function () {
    return view('pages/fotos');
});
Route::get('/videos', function () {
    return view('pages/videos');
});
Route::get('/login', function () {
    return view('pages/login');
});
Route::get('/registreren', function () {
    return view('pages/registreren');
});
// =============== navbar pages end =====================

Route::resource('images', ImageController::class);
