<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // session(['peter'=>'student']);
        // $request->session()->put(['edwin'=>'instructor']);

        // $request->session()->forget('peter');
        // $request->session()->flush();
        // return $request->session()->all();
        // echo $request->session()->get('edwin');
        // return view('home');

        // $request->session()->flash('message', 'Post has been created!.');

        // return $request->session()->get('message');

        // $request->session()->reflash();
        // $request->session()->keep('message');
    }
}
