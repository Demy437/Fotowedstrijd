<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ArticleController;

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::post('register', [ApiAuthController::class, 'register']);
    
    
});

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
  // Route::post('logout', [ApiAuthController::class, 'logout']);    
});
Route::middleware( 'auth:api', 'api.admin')->group(function () {

    Route::resource('articles', ArticleController::class);
});



