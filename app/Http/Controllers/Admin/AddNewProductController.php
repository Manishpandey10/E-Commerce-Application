<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductCategory;
use App\Models\Productdata;
use App\Models\Theme;
use Illuminate\Http\Request;

class AddNewProductController extends Controller
{
    public function index()
    {
        $colors = Color::get();
        $theme = Theme::get();
        $category = ProductCategory::get();
        // $productdata = Productdata::with('color','theme','category')->get();
        // dd($productdata);
        return view('products.addNewProduct', compact('colors', 'theme', 'category'));
    }
    public function addnewproduct(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'productCategory' => 'required',
            'productDescription' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'metaTitle' => 'nullable',
            'metaDescription' => 'nullable',
            'productStatus' => 'required|in:0,1',
            'color' => 'required',
            'theme' => 'required'
        ], [
            'productname.required' => 'Enter Product Name field is required.',
            'productCategory.required' => 'Category field is required.',

            'productDescription.required' => 'Enter Product Description field is required.',
            'thumbnail.required' => 'Upload Thumbnail field is required.',
            // 'metaTitle.required'=>'Meta Title field is required.',
            // 'metaDescription.required'=>'Meta Description field is required.',
            'productStatus.required' => 'Status  field is required.',
            'productStatus.in' => 'Status filed is required.',
            'color.required' => 'Color field is required.',
            'theme.required' => 'Theme field is required.',
        ]);

        $newProduct = new Productdata();
        $newProduct->productname = $request->productname;
        $newProduct->category_id = $request->productCategory;
        $newProduct->productDescription = $request->productDescription;
        $newProduct->productthumbnail = $request->file('thumbnail')->store('productpicture', 'public');
        $newProduct->metaTitle = $request->metaTitle;
        $newProduct->metaDescription = $request->metaDescription;
        $newProduct->productStatus = $request->productStatus;
        $newProduct->color_id = $request->color;
        $newProduct->theme_id = $request->theme;

        //    dd($newProduct);
        $newProduct->save();
        $page = Productdata::paginate(15);

        return response()->json([
            'status'=>'success',
            'newProductAdded'=>'New Product added.',            
        ]);

        // return redirect()->route('product.list', ['page' => $page])->with('newProductAdded', 'New Product added.');
    }
}
