<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

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
Route::get('/delete', function(){
    $post = Post::find(1);

    foreach ($post->tags as $tag ) {
        $tag->whereId(2)->delete();
    }
});
Route::get('/read', function(){
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag) {
        echo $tag;
    }
});
Route::get('/update', function(){
    $post = Post::findOrFail(1);

    // foreach ($post->tags as $tag) {
    //    return $tag->whereName('PHP')->update(['name'=>'PHP bahu Buto']);
    // }
    $tag = Tag::find(3);

    // $post->tags()->save($tag);
    $post->tags()->sync([1,2,3]);
});

Route::get('/create', function(){
    $post = Post::create(['name'=>'My first post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);
    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);
});
Route::get('/', function () {
    return view('welcome');
});
