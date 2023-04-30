<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NASAAPIController;
use App\Http\Controllers\WowImagesController;
use App\Http\Controllers\WowImagesCommentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(NASAAPIController::class)->group(function(){
    Route::get('get_images/{page}', 'get_images');
});

Route::controller(WowImagesController::class)->group(function(){
    Route::prefix('/image')->group( function () {
        Route::post('/save', 'save');
        Route::post('/wowed', 'wowed');
        Route::delete('/{id}', 'destroy');
    });
});
Route::controller(WowImagesCommentsController::class)->group(function(){
    Route::get('/comments/{img_id}', 'index');
    Route::prefix('/comment')->group( function () {
        Route::post('/save', 'save');
        Route::delete('/{id}', 'destroy');
    });
});