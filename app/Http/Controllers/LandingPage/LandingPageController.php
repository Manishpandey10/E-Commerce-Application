<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Models\Productdata;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $productdata = Productdata::all();
        $posts = Post::limit(5)->get();
        return view('landing_page.index', compact('productdata','posts'));
    }
    public function shop(){
        $posts = Productdata::all();
        $category = ProductCategory::all();
        return view('landing_page.shop',compact('posts','category'));
    }
    public function contact(){
        return view('landing_page.contact');
    }
    
}
