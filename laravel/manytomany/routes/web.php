<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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
Route::get('/attach', function(){
    $user = User::findOrFail(2);

    $user->roles()->attach(2);
});
Route::get('/detach', function(){
    $user = User::findOrFail(2);

    $user->roles()->detach(2);
});
Route::get('/sync', function(){
    $user = User::findOrFail(1);
    $user->roles()->sync([1,2]);
});
Route::get('delete/{id}', function($id){
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        $role->whereId($id)->delete();
    }    
});
Route::get('update/{id}', function($id){
    $user = User::findOrFail($id);

    if($user->has('roles')){
        foreach ($user->roles as $role ) {
            if($role->name == 'administrator'){
                $role->name = 'Administrator';
                $role->save();
            }
        }
    }
    
});
Route::get('read/{id}', function($id){
    $user = User::findOrFail($id);

    foreach ($user->roles as $role) {
        return $role->name;
    }
    
});
Route::get('/create', function(){
    $user = User::findOrFail(1);

    // $rule = new Role(['name'=>'subscriber']);

    $user->roles()->save(new Role(['name'=>'Author']));

});
Route::get('/', function () {
    return view('welcome');
});
