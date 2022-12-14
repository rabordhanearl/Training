<?php

use Illuminate\Support\Facades\Mail;
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

    $data =[
        'title'=> 'When are you coming back?',
        'content'=> 'This Laravel course was created by Pungkel.'
    ];

    Mail::send('emails.test', $data , function($message){
        $message->to('dhanearl.rabor@nabepero.co.jp', 'Dhan Earl')->subject('Hello, Im Me');
    });
});