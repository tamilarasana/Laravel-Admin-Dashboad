<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Storage;
use File;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
       $category = Category::all();
        return view('category.index', compact('category'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){

        $imagename = Str::random($length = 10);
        if($request->hasFile('cat_logo')){
           $cat_logo = $imagename.'_'.time().'.'. request()->cat_logo->getClientOriginalExtension();
           $path=   $request->cat_logo->storeAs('cat_logo',$cat_logo,'public');
           $cat_logo = $path;
         }

         if($request->hasFile('cat_image')){
           $cat_image = $imagename.'_'.time().'.'. request()->cat_image->getClientOriginalExtension();
           $path=   $request->cat_image->storeAs('cat_image',$cat_image,'public');
           $cat_image = $path;
         }

        $category = new Category;
        $category->title = $request->title;
        $category->cat_logo = $cat_logo;
        $category-> status = $request->status;
        $category->cat_image = $cat_image;
        $category->save();
        return redirect('category')->with('success', 'Created successfully!');
    }

    public function edit($id){
         $category =Category::findOrFail($id);
         return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $catgeory = Category::findOrFail($id);
        $cat_logo = $catgeory ->cat_logo;
        $cat_image = $catgeory ->cat_image;
        $imagename = Str::random($length = 10);
        if($request->hasFile('cat_logo')){
             if($cat_logo){
                Storage::delete('/public/'.$cat_logo);
            }
           $cat_logo = $imagename.'_'.time().'.'. request()->cat_logo->getClientOriginalExtension();
           $path=   $request->cat_logo->storeAs('cat_logo',$cat_logo,'public');
           $cat_logo = $path;
         }

         if($request->hasFile('cat_image')){
            if($cat_image){
                Storage::delete('/public/'.$cat_image);
            }
            $cat_image = $imagename.'_'.time().'.'. request()->cat_image->getClientOriginalExtension();
           $path=   $request->cat_image->storeAs('cat_image',$cat_image,'public');
           $cat_image = $path;
         }

        $catgeory->update([
            'title' =>$request->title,
            'status' => $request->status,
            'cat_image' => $cat_image,
            'cat_logo' => $cat_logo

        ]);
        return redirect('category')->with('updated', 'Updated successfully!');
    }
    public function destroy ($id)
    {
        $category =Category::findOrFail($id);
        $category->delete();
        Storage::delete('/public/'.$category->cat_logo);
        Storage::delete('/public/'.$category->cat_image);
        return redirect('category');
    }
}
