<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Photo;
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
Route::get('assign', function(){
    $staff = Staff::findOrFail(1);

    $staff->photos()->save(Photo::find(4));
});
Route::get('unassign', function(){
    $staff = Staff::findOrFail(1);
    $staff->photos()->whereId(4)->update(['imageable_id'=>0, 'imageable_type'=>' ']);

});
Route::get('/delete', function(){
    $staff = Staff::findOrFail(1);

    $staff->photos()->delete();
});
Route::get('/update', function(){
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path="Updated example.jpg";

    $photo->save();
});
Route::get('/read', function(){
    $staff = Staff::findOrFail(1);

    foreach ($staff->photos as $photo) {
        return $photo->path;
    }
});
Route::get('/create', function(){
    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example.jpg']);
});
Route::get('/', function () {
    return view('welcome');
});
