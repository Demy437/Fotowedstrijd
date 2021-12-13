<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VideoController;



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
    return view('home');
});

Auth::routes();

// =============== navbar pages start =====================

Route::get('/fotos', function () {
    return view('pages/fotos');
});
Auth::routes();

Route::get('/videos', function () {

    return view('pages/videos');
});
Route::get('/login', function () {
    return view('pages/login');
});
Route::get('/registreren', function () {
    return view('pages/registreren');
    return view('videos');
    return view('pages/videos');
});
Auth::routes();

Route::get('/login', function () {
    return view('auth/login');
});
Auth::routes();

Route::get('/register', function () {
    return view('auth/register');
});
Auth::routes();

// =============== navbar pages end =====================

Route::resource('images', ImageController::class);
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LogoutController::class, 'perform']);
 });

 //======================= video upload========================
  
Route::resource('videos', VideoController::class);