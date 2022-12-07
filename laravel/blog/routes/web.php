<?php

use App\Models\Post;
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
Route::get('/insert', function () {
    
    DB::insert('insert into posts (title, content, author) values (?, ?, ?)', ['Php with Laravel', 'Laravel is a PHP platform', 'Dhan Earl Rabor']);
});

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id = ?', [1]);

//     foreach ($results as $post ) {
//         return $post->content;
//     }
// });

// Route::get('/update', function(){

//     return $updated = DB::update('update posts set title = "Fantastic Title" where id = ?', [1]);

// });

// Route::get('/delete', function(){

//     return DB::delete('delete from posts where id = ?', [2]);

// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index']);

// Route::resource('posts', PostController::class);

Route::get('/contact', [PostController::class, 'showMyContact']);

// Route::get('post/{id}/{name}/{age}', [PostController::class, 'showPost']);

Route::get('/read', [PostController::class, 'index']);

// Route::get('/basicupdate', function(){
//     $post = Post::find(3);
//     $post->title = "The land of the Beginning";
//     $post->content = "As I walk down the street, down the street";
//     $post->author = "Cocomelon";
//     $post->save();
// });

Route::get('create', function () {
    Post::create(['title'=>'Game of Thrones', 'content'=>'Full of Dragons and droggos.', 'author'=>'Jake Winterfall']);
});

Route::get('/update', function () {
    Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'Star Wars', 'content'=>'Anakin Skywalker is Gay.', 'author'=>'Darth Vader']);
});