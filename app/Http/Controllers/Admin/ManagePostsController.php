<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class ManagePostsController extends Controller
{
    public function index(){
        $postData = Post::all();
        // dd($postData);
        return view('products.managePosts', compact('postData'));
    }
    public function delete($id){
        $data = Post::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('manage.post')->with('postDeleted','Post has been deleted');
    }
}
