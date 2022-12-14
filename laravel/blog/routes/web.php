<?php

// use App\Models\Post;
use App\Models\User;
// use App\Models\Roles;
// use App\Models\Country;
// use App\Models\Photo;
// use App\Models\Tag;
// use App\Models\Video;
use Carbon\Carbon;
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
Route::group(['middleware'=>'web'], function(){


    Route::resource('/posts', PostController::class);

    Route::get('/dates', function(){
        $date = new DateTime();

        echo $date->format('m-d-Y');

        echo '</br>';
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo '</br>';
        echo Carbon::now()->yesterday()->diffForHumans();
    });

    Route::get('/setname', function(){
        $user = User::find(1);
        $user->name = 'icecream';
        $user->save();
    });
});



// Route::get('photo', function () {
//     $post = Post::find(1);
//     foreach ($post->photos as $photo) {
//         return $photo->path;
//     }
// });

// Route::get('posts/tag', function () {
//     $post = Post::find(1);

//     foreach ($post->tags as $tag) {
//         return $tag->name;
//     }
// });

// Route::get('tag/video', function () {
//     $tag = Tag::find(1);

//     foreach ($tag->videos as $video) {
//         return $video;
//     }
// });

// Route::get('photo/{id}/post', function ($id) {
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });
// Route::get('/user/{id}/post', function($id){
//     return  User::find($id)->post;
// });

// Route::get('/post/{id}/user', function($id){
//     return  Post::find($id)->user;
// });
// Route::get('posts/{id}', function ($id) {
//     $result = User::find($id);

//     foreach ($result->posts as $post) {
//         echo $post->title . '</br>';
//     }
// });
// Route::get('roles/{id}', function ($id) {
//     return User::find($id)->roles()->get();

//     foreach ($result as $role) {
//         return $role->name;
//     }
// });
// Route::get('user/pivot', function () {
//     $result = User::find(1)->roles;

//     foreach ($result as $role) {
//         return $role->pivot->created_at;
//     }
// });
// Route::get('user/country/{id}', function ($id) {
//     $country = Country::find($id);

//     foreach ($country->posts as $post ) {
//         # code...
//         echo $post->title . '</br>';
//     }
   
// });
// Route::get('/insert', function () {
    
//     DB::insert('insert into posts (title, content, author) values (?, ?, ?)', ['Php with Laravel', 'Laravel is a PHP platform', 'Dhan Earl Rabor']);
// });

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

// Route::get('/post', [PostController::class, 'index']);

// // Route::resource('posts', PostController::class);

// Route::get('/contact', [PostController::class, 'showMyContact']);

// // Route::get('post/{id}/{name}/{age}', [PostController::class, 'showPost']);

// Route::get('/read', [PostController::class, 'index']);

// Route::get('/basicupdate', function(){
//     $post = Post::find(3);
//     $post->title = "The land of the Beginning";
//     $post->content = "As I walk down the street, down the street";
//     $post->author = "Cocomelon";
//     $post->save();
// });

// Route::get('create', function () {
//     return Post::create(['user_id'=>001,'title'=>'Star Wars', 'content'=>'Anakin Skywalker is Gay.']);
// });

// Route::get('/update', function () {
//     Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'Star Wars', 'content'=>'Anakin Skywalker is Gay.', 'author'=>'Darth Vader']);
// });

