<?php

Use App\Models\User;
Use App\Models\Address;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    $user = User::findOrFail(2);

    $address = new Address(['name'=>'Sitio Tabay, Guadalupe, Cebu City, Philippines']);

    $user->address()->save($address);

});

Route::get('update/{id}', function ($id) {
    $address = Address::whereUserId($id)->first();

    $address->name = "lot 69 Summerville subdivision, Sitio Cotcot, Liloan, Lapu-lapu City, Philippines";

    $address->save();
});

Route::get('read/{id}', function ($id) {
    
    $user = User::findOrFail($id);

    return $user->address->name;

});

Route::get('delete/{id}', function ($id){

    $user = User::findOrFail($id);

    $user->address()->delete();

    return "success";
});