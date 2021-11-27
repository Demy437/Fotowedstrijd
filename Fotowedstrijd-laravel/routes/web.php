<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// =============== navbar pages start =====================
Route::get('/', function () {
    return view('index');
});
Route::get('/fotos', function () {
    return view('fotos');
});
Route::get('/videos', function () {
    return view('videos');
});
// =============== navbar pages end =====================

Route::resource('images', ImageController::class);
