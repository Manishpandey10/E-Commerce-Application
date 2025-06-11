<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show()
    {
        $user  = Auth::user();
        return view('frontend.Users.userDashboard', compact('user'));
    }
    public function create(){
        return view('frontend.Users.createPost');
    }
    public function profile($id){
        
        $post = Post::where('id',$id)->get();
        return view('frontend.Users.userProfile', compact('post'));
    
    }
    public function post(Request $request){
        $request->validate([
            'post_title'=>'required',
            'picture'=>'required|image|mimes:png,jpg,jpeg',
            'description'=>'required'
        ],
    [
        'post_title.required'=>'Post Title field is required.',
        'picture.required'=>'Upload Picture  field is required.',
        'description.required'=>'Enter Description field is required.'
    ]);
    $data = new Post;
    $data->post_title = $request->post_title;
    $data->description = $request->description;
    if($request->hasFile('picture')){
        $data->picture = $request->file('picture')->store('postThumbnail', 'public');
    }
    // dd($data);
    $data->save();
    // return response()->json([
    //     "status"=>"success",
    //     "data"=> $data
    // ]);
    return redirect()->route('all.post')->with("post_created","New post has been created.!!");
    }   
    public function showAllPosts(){
        $posts = Post::all();

        return view('frontend.Users.feed', compact('posts'));
    }
}
