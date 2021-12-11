<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'all_posts']);
Route::get('/category/{id}', [HomeController::class, 'category_post']);
Route::get('/post/{slug}', [HomeController::class, 'full_post']);
Route::get('/categories', [HomeController::class, 'categories']);
Route::post('/post', [HomeController::class, 'add_comment']);


Route::prefix('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/check', [AdminController::class, 'check'])->name('admin.check');

    Route::get('/forgot', [AdminController::class, 'forgot']);
    Route::post('/forgot_password', [AdminController::class, 'forgot_password'])->name('admin.forgot_password');

    Route::get('/reset', [AdminController::class, 'reset']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['AuthCheck']], function () {
    Route::get('/login', [AdminController::class, 'login']);

    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::post('/manage_category', [AdminController::class, 'manage_category']);
    Route::get('/categories', [AdminController::class, 'categories']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

    Route::post('/create_post', [AdminController::class, 'create_post']);
    Route::post('/update_post', [AdminController::class, 'update_post']);

    Route::get('/posts', [AdminController::class, 'posts']);
    Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
    Route::get('/add_post', [AdminController::class, 'add_post']);
    Route::get('/edit_post/{id}', [AdminController::class, 'edit_post']);
});
