<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Productdata;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    public function index(){
        $categorydata = ProductCategory::get();
        // dd($products);
        return view('products.productCategoryList', compact('categorydata'));
    }
    public function delete($id){
        $data = ProductCategory::where('id',$id);
        // dd($data);
        if($data){
            $data->delete();
            return response()->json([
            "status"=>"success",
            'productDeleted'=> 'The product has been deleted!.'    

        ]);
        //laravel method below.   
        // return redirect()->back()->with('productDeleted','Product Category has been deleted !');
        }
    }
    public function editpage($id){
        $categorydata = ProductCategory::find($id);
        // dd($categorydata);
        return view('products.editProductCategory', compact('categorydata'));
    }

    public function updateproduct(Request $request, $id){
        
        $request->validate([
            'categoryname'=>'required',
            'productDescription'=>'required',
            'thumbnail'=>'nullable|image|mimes:png,jpg,jpeg',
            'metaTitle'=>'nullable',
            'metaDescription'=>'nullable',
            'productStatus'=>'required|in:0,1'
        ],[
            'categoryname.required'=>'Product Category Name field is required.',
            'productDescription.required'=>'Enter Description field is required.',
            'productStatus.required'=>'Status  field is required.',
            'productStatus.in'=>'Status  field is required.',
        ]);

        $updatedcategory = ProductCategory::find($id);
        $updatedcategory->categoryname = $request->categoryname;
        $updatedcategory->productDescription = $request->productDescription;

        if($request->hasFile('thumbnail')){
            $updatedcategory->thumbnail = $request->file('thumbnail')->store('productThumbnail' , 'public');
        };
        
        $updatedcategory->metaTitle = $request->metaTitle;
        $updatedcategory->metaDescription = $request->metaDescription;
        $updatedcategory->productStatus = $request->productStatus;
        // dd($updatedcategory);
        $updatedcategory->save();

        // $page = ProductCategory::paginate(15);
        return response()->json([
            "status"=>"success",
            'updateSuccess'=>"product category details has been updated successfully!"
        ]);
        // return redirect()->route('manage.product',['page'=>$page])->with('updateSuccess','The product category details has been updated!');


    }

}
