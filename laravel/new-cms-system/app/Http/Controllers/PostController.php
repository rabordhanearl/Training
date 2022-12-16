<?php

namespace App\Http\Controllers;

use App\Models\Post;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post){
        return view('blog-post', ['post'=> $post]);
    }

    public function create(){
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }
    
    public function index(){

        // $posts = auth()->user()->posts;
        $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function store(){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'file',
            'body'=> 'required',
        ]);
        
        // if(request('post_image')){
        //     $inputs['post_image'] = request('post_image')->store('images');
        // }

  
        if ($image = request('post_image')) {
            $destinationPath = 'storage/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputs['post_image'] = "$profileImage";
        }
        
        auth()->user()->posts()->create($inputs);

        
        Session::flash('post_created_message', 'Post was created.'); 
        return redirect()->route('post.index');

    }
    // public function store() { 
    //     // auth()->user; 
    //     // dd(request()->all()); 
    //     $inputs = request()->validate([ 
    //         'title' => 'required|min:8|max:255', 
    //         'post_image' => 'file', 'body' => 'required' 
    //     ]); 
    //     if (request()->hasFile('post_image')) { 
    //         $inputs['post_image'] = request()->file('post_image')->store('images'); 
    //         $inputs['post_image'] = time() . '.' . request()->post_image->extension(); 
    //         request()->post_image->move(public_path('images'), $inputs['post_image']); } 
    //         auth()->user()->posts()->create($inputs); 
    //         //return back(); 
    //         session()->flash('post-created-message', 'Post was created.'); 
    //         return redirect()->route('post.index'); 
    //     }

    public function destroy(Post $post){
        $this->authorize('delete', $post);

        $post->delete();

        Session::flash('message', 'Post was DELETED.'); 
        return back();
    }

    public function edit(Post $post){

        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post){
        $inputs = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'file',
            'body'=> 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];  
        $this->authorize('update', $post);
        

        $post->update();

        Session::flash('message-updated', 'Post was UPDATED.'); 

        return redirect()->route('post.index');
    }

}
