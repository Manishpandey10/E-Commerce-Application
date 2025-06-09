<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductCategory;
use App\Models\Productdata;
use App\Models\Theme;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $productdata = Productdata::with('color','theme','category')->get();
    //    dd($productdata);
        return view('products.productList',compact('productdata'));
    }

    public function delete($id)
    {
        $data  = Productdata::find($id);
        // dd($data);// checking the data is fetched or not 
        if ($data)
            $data->delete();

        return response()->json([
            "status"=>"success",
            'deleted'=> 'The product has been deleted!.'    

        ]);
        // return redirect()->back()->with( 'deleted', 'The product has been deleted!.' );
    }
    public function editpage($id)
    {
        $productdata = Productdata::find($id);
        $colors = Color::get();
        $theme = Theme::get();
        $category = ProductCategory::get();
        // dd($editproduct);
        // dd($productdata);
    //     return response()->json([
    //     'status' => 'success',
    //     'productdata' => $productdata,
    //     'colors' => $colors,
    //     'theme' => $theme,
    //     'category' => $category,
    // ]);
        return view('products.editProduct', compact('productdata', 'colors','theme','category'));
    }
    public function updateproduct(Request $request, $id)
    {
        $request->validate([
            "productname" => "required",
            "productCategory" => "required",
            "productDescription" => "required",
            "productthumbnail" => "nullable|image|mimes:png,jpg,jpeg",
            "metaTitle" => "nullable",
            "metaDescription" => "nullable",
            "productStatus" => "required|in:0,1",
            "color" => "required",
            "theme" => "required"

        ], [
            'productname.required' => 'Enter Product Name field is required.',
            'productCategory.required'=>'Category field is required.',
            'productDescription.required' => 'Enter Product Description field is required.',
            'productthumbanil.required' => 'Upload Thumbnail field is required.',
            // 'metaTitle.required' => 'Meta title field is required.',
            // 'metaDescription.required' => 'Meta description field is required.',
            'productStatus.in' => 'Status field is required.',
             'color.required'=>'Color  field is required.',
            'theme.required'=>'Theme  field is required.',
        ]);
        $updatedata = Productdata::find($id);
        $updatedata->update([
            $updatedata->productname = $request->productname,
            $updatedata->category_id = $request->productCategory,
            $updatedata->productDescription = $request->productDescription,
            $updatedata->metaTitle = $request->metaTitle,
            $updatedata->metaDescription = $request->metaDescription,
            $updatedata->productStatus = $request->productStatus,
            $updatedata->color_id = $request->color,
            $updatedata->theme_id = $request->theme
            
        ]);
        //file input 
        if ($request->hasFile('productthumbnail')) {
            $updatedata->productthumbnail = $request->file('productthumbnail')->store('productpicture', 'public');
        }
        //saving the data
        $updatedata->save();
        // $page = Productdata::paginate(15);
        return response()->json([
            "status"=>"success",
            'productupdated'=>"product details has been updated successfully!"
        ]);
        // return redirect()->route('product.list', ['page' => $page])->with('productupdated', "product details has been updated successfully!");
    }
}
