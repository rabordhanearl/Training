<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index']);

// Route::resource('posts', PostController::class);

Route::get('/contact', [PostController::class, 'showMyContact']);

Route::get('post/{id}/{name}/{age}', [PostController::class, 'showPost']);