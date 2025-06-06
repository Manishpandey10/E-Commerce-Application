<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class newCategoryController extends Controller
{
    public function index(){
        return view('products.addNewCategory');
    }
    public function addcategory(Request $request){
        $request->validate([
            'categoryname'=>'required',
            'productDescription'=>'required',
            'thumbnail'=>'required|image|mimes:png,jpg,jpeg',
            'metaTitle'=>'nullable',
            'metaDescription'=>'nullable',
            'productStatus'=>'required||in:0,1'
        ],[
            'categoryname.required'=>' Product Category Name field is required.',
            'productDescription.required'=>'Enter Description field is required.',
            'thumbnail.required'=>'Upload Thumbnail field is required.',
            // 'metaTitle.required'=>'Meta Title field is required.',
            // 'metaDescription.required'=>'Enter Meta Description field is required.',
            'productStatus.required'=>'Product status option field is required.',
            'productStatus.in'=>'Product status option field is required.',
        ]);

        $newcategory = new ProductCategory();
        $newcategory->categoryname = $request->categoryname;
        $newcategory->productDescription = $request->productDescription;
        $newcategory->thumbnail = $request->file('thumbnail')->store('productThumbnail' , 'public');
        $newcategory->metaTitle = $request->metaTitle;
        $newcategory->metaDescription = $request->metaDescription;
        $newcategory->productStatus = $request->productStatus;
        // dd($newcategory);
        $newcategory->save();
        $page = ProductCategory::paginate(15);
        
        return response()->json(
            [
                "status"=>"success",
                'productAdded'=>'New Product category has been created!!'
            ]
        );

        // return redirect()->route('manage.product',['page'=>$page])->with('productAdded','New Product category has been created!!');
    }
}
