<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'all_posts']);
Route::get('/category/{id}', [HomeController::class, 'category_post']);
Route::get('/post/{slug}', [HomeController::class, 'full_post']);
Route::get('/categories', [HomeController::class, 'categories']);
Route::post('/post', [HomeController::class, 'add_comment']);