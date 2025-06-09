<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ManageThemeController extends Controller
{
    public function index()
    {
        $theme = Theme::all();
        // dd($theme);
        return view('products.manageTheme', compact('theme'));
    }
    public function create()
    {
        return view('products.addNewTheme');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'themethumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'required|in:0,1'
        ], [
            'name.required' => 'Enter Theme name field is required.',
            'themethumbnail.required' => 'Upload thumbnail field is required.',
            'status.in' => 'Status field is required.'
        ]);
        $theme = new Theme();
        $theme->name = $request->name;
        if ($request->hasFile('themethumbnail')) {
            $theme->thumbnail = $request->file('themethumbnail')->store('themeThumbnail', 'public');
        }

        $theme->status = $request->status;
        // dd($theme);
        $theme->save(); 
        return response()->json([
            'status'=>'success',
            'ThemeSucess'=> 'New Theme has been added'
        ]);// To save the data on the  database.
        // return redirect()->route('manage.theme')->with('ThemeSucess', "New Theme has been added.");
    }
    public function edit($id)
    {
        $theme = Theme::find($id);
        // dd($theme);
        return view('products.editTheme', compact('theme'));
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            'themethumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'required|in:0,1'
        ], [
            'name.required' => 'Enter Theme name field is required.',
            'themethumbnail.required' => 'Upload thumbnail field is required.',
            'status.in' => 'Status field is required.'
        ]);
        $updatedtheme = Theme::find($id);
        $updatedtheme->name = $request->name;
        if($request->hasFile('themeThumbnail')){
            $updatedtheme->thumbnail = $request->file('themethumbnail')->store('themeThumbnail', 'public');
        }
        $updatedtheme->status = $request->status;
        // dd($updatedtheme);
        $updatedtheme->save();
        return response()->json([
            'status'=>'success',
            'updateTheme'=> 'Theme details has been updated succesfuly',
        ]);
        // return redirect()->route('manage.theme')->with('updateTheme', "Theme details has been updated succesfuly.");

    }

    public function delete($id)
    {
        $data = Theme::find($id);
        $data->delete();
        return response()->json([
            'status'=>'success',
            'ThemeDeleted'=>'Theme Details has been deleted successfuly'
        ]);
        // return redirect()->route('manage.theme')->with('ThemeDeleted', 'Theme Details has been deleted successfuly.');
    }
}
