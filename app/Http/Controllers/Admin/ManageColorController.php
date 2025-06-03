<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ManageColorController extends Controller
{
    public function index(){
        $color = Color::all();
        // dd($color);
        return view('products.manageColor', compact('color'));
    }
    public function create(){
        return view('products.addNewColor');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'colorthumbnail'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|in:0,1'
        ],[
            'name.required'=>'Enter Color name field is required.',
            'colorthumbnail.required'=>'Upload thumbnail field is required.',
            'status.in'=>'status option field is required.'
        ]);

        $color = new Color();
        $color->name = $request->name;
        $color->thumbnail=$request->file('colorthumbnail')->store('colorthumbnail', 'public');
        $color->status = $request->status;
        // dd($color);
        $color->save();

        return redirect()->route('manage.color')->with('addedColor','New Color data has been added.');

    }
    public function edit($id){
        $color = Color::find($id);
        // dd($color);
        return view('products.editColor',compact('color'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'colorthumbnail'=>'nullable|image|mimes:png,jpg,jpeg',
            'status'=>'required|in:0,1'
        ],
    [
        'name.required'=>'Enter color name field is required.',
        'colorthumbnail.required'=>'Upload thumbnail field is required.',
        'status.in'=>'Status option field is required.'
    ]);
    $color = Color::find($id);
    $color->name = $request->name;
    if($request->hasFile('colorthumbnail')){
        $color->colorthumbnail = $request->file('colorthumbnail')->store('colorthumbnail', 'public');
    }
    $color->status = $request->status;

    // dd($color);
    $color->save();
    return redirect()->route('manage.color')->with('colorEdit','Color details has been updated successfully!!');
    }

    public function delete($id){
        $data = Color::find($id);
        // dd($data);
        $data->delete();

        return redirect()->route('manage.color')->with('colorDeleted','Color details has been deleted');
    }

}
