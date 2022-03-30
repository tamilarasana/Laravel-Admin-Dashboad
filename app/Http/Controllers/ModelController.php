<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Category;
use File;
use Storage;
use Str;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = CarModel::with('category')->get();
        // $ta = $model->pluck('category.title');
        // dd($ta);
        return view('models.index', ['model'=> $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('models.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
        "file" => "required|mimes:pdf",
    ]);
        $check_postion_exists = $request->position;
        if($check_postion_exists){
            $check_position  = CarModel::where('category_id',$request->category_id )
                                ->where('position', $request->position)->get();
            if($check_position->isEmpty()){
                $imagename = Str::random($length = 10);
                if($request->hasFile('image')){
                    $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
                    $path=   $request->image->storeAs('model_image',$image,'public');
                    $image = $path;
                }
                if($request->hasFile('file')){
                    $file = $request->file('file');
                    $extension  = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/file/',$filename);
                    $path = 'uploads/file/'.$filename;
                    $pdffile  = $path;
                }
                $model = New CarModel;
                $model->category_id = $request->category_id;
                $model->title = $request->title;
                $model->starting_price = $request->starting_price;
                $model->seo_title = $request->seo_title;
                $model->seo_tag = $request->seo_tag;
                $model->seo_desc = $request->seo_desc;
                $model->position = $request->position;
                $model->description = $request->description;
                $model->image = $image;
                $model->file = $pdffile;
                $model->save();
            }else{
                return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
            }
       }
    return redirect('models')->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
        //
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = CarModel::findOrFail($id);
        $category = Category::all();
        return view('models.edit',['model' => $model, 'category' => $category]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          "file" => "required|mimes:pdf",
        ]);

       $model = CarModel::findOrFail($id);
       $image = $model ->image;
       $file = $model->file;
            $imagename = Str::random($length = 10);
                if($request->hasFile('image')){
                    if($image){
                        Storage::delete('/public/'.$image);
                    }
                    $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
                    $path=   $request->image->storeAs('model_image',$image,'public');
                    $image = $path;
                }
                if($request->hasFile('file')){
                    if(File::exists($file)){
                    File::delete($file);
                }
                    $file = $request->file('file');
                    $extension  = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/file/',$filename);
                    $path = 'uploads/file/'.$filename;
                    $pdffile  = $path;
                    $model->file = $pdffile;

                }
                if($request->has('category_id')){
                $model->category_id = $request->category_id;
                }
                if($request ->has('title')){
                    $model->title = $request->title;
                }
                if($request ->has('starting_price')){
                    $model->starting_price = $request->starting_price;
                }
                if($request ->has('seo_title')){
                    $model->seo_title = $request->seo_title;
                }
                if($request ->has('seo_tag')){
                    $model->seo_tag = $request->seo_tag;
                }
                if($request ->has('seo_desc')){
                    $model->seo_desc = $request->seo_desc;
                }
                if($request ->has('position')){
                    $check_position  = CarModel::where('category_id',$request->category_id )
                                               ->where('position', $request->position)->get();
                    if($check_position->isEmpty()){
                        $model->position = $request->position;
                    }
                }
                if($request ->has('description')){
                    $model->description = $request->description;
                }
                if($request->has('image')){
                    $model->image = $image;
                }

                $model->update();
            return redirect('models')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CarModel::findOrFail($id);
        $file = $model->file;
        if(File::exists($file)){
            File::delete($file);
        }
        $model->delete();
        Storage::delete('/public/'.$model->image);
        return redirect('models');
    }
}
