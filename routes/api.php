<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('post/{id?}', [ApiController::class,'post']);
Route::get('category/{id?}', [ApiController::class,'category']);
Route::get('search/{s}',[ApiController::class,'search']);
Route::post('add_comment',[ApiController::class,'add_comment']);