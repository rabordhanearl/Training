<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user]);
    }

    public function index(){

        // $users = User::all();
        $users = auth()->user()->paginate(25);
        return view('admin.users.index', ['users'=>$users]);
    }

    public function update(User $user){
        $inputs = request()->validate([
            'username'=> ['required','string', 'max:255', 'alpha_dash'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file'],
            
        ]);

        // dd(request()->all());
        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        return view('admin.users.profile', ['user'=>$user]);
    }

    public function destroy(User $user){

        $user->delete();
        Session::flash('user-deleted', 'User has been Deleted!');
        return back();
    }
}
