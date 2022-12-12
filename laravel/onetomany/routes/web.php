<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
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
Route::get('/create', function () {
    $user = User::findOrFail(1);

    // $post = new Post(['title'=>'My Second Post Title', 'body'=>'My Second Post Body']);

    $user->posts()->save(new Post(['title'=>'My Post Title', 'body'=>'My Post Title']));

    return "success";
});

Route::get('read/{id}', function ($id) {
    $user = User::findOrFail($id);

    // dd($user->posts);
    foreach ($user->posts as $post) {
        echo $post->title . '</br>';
    }
});
//UPDATE
Route::get('update/{id}', function($id){
    $user = user::findOrFail($id);

    $user->posts()->whereId($id)->update(['title'=>'Updating number '.$id. ' Title','body'=>'Updating number '.$id.' Body']);

});
//DELETE
Route::get('delete/{id}', function($id){

    $user = User::findOrFail($id);

    $user->posts()->where('id','!=', $id)->delete();
});

Route::get('/', function () {
    return view('welcome');
});
