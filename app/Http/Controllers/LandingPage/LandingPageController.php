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
        $productData = Productdata::all();
        $category = ProductCategory::all();
        return view('landing_page.shop',compact('productData','category'));
    }
    public function contact(){
        return view('landing_page.contact');
    }
    public function filter($id){
        // $productData = Productdata::all();

        $category = ProductCategory::all();
        $productData = Productdata::where('category_id',$id)->get();

        return view('landing_page.shop',compact('category','productData'));
    }
    public function productDetails($id){
        $details = Productdata::where('id',$id)->get();
        // dd($details);
        return view('landing_page.productDetails',compact('details'));
    }
    
}
