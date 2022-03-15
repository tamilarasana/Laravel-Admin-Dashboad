<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Varient;
use File;
use Storage;
use Str;
use DB;

class ProductController extends Controller
{
    public function index(){
        $cars = Product::with('images','carmodel', 'varient','category')->get();
        return view('cars.index', ['cars'=> $cars]);
    }

    public function create(){
        // $category = DB::table('categories')->select('id','title')->get();
        $category =  Category::all();
        $model =  CarModel::all();
        $varient =  Varient::all();
        return view ('cars.create',['models'=>$model, 'varient' => $varient,'category' => $category]);
    }

    public function store(Request $request){
        // $cars = new Product;
        $validated = $request->validate([
            'category_id' => 'required',
            'car_model_id' => 'required',
            'varient_id' => 'required'
        ]);
        $car['category_id'] = $request->category_id;
        $car['car_model_id'] = $request->car_model_id;
        $car['varient_id'] = $request->varient_id;
        $car['name']= $request->name;
        $car['transmission']= $request->transmission;
        $car['body']= $request->body;
        $car['about_car'] = $request->about_car;
        $car['price'] = $request->price;
        $car['route'] = $request->route;
        $car['description'] = $request->description;
        $car['color_name'] = $request->color_name;
        $car['color_name2'] = $request->color_name2;
        $car['colour_code'] = $request->colour_code;
        $car['colour_code2'] = $request->colour_code2;
        $cars = Product::create($car);

        $imagename = Str::random($length = 10);
          if($request->has('images'))
           {
             $files = $request->file('images');

              foreach ($files as $key => $file)
               {
                  $image = $imagename.'_'.$key .'_'.time().'.'. $file->getClientOriginalExtension();
                  $path =  $file->storeAs('images',$image,'public');
                  $data['product_id'] = $cars->id;
                  $data['images'] = $path;
                  $car = Image::create($data);
                }
            }
        return redirect('car')->with('success', 'Created successfully!');

    }
    public function show($id)
    {
        //
    }

    public function edit($id){
        $cars = Product::findOrFail($id);
        $models = CarModel::all();
        $category = Category::all();
        $varient = Varient::all();
        return view('cars.edit',['cars' => $cars,'models' => $models ,'varient' => $varient, 'category' => $category]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'category_id' => 'required',
            'car_model_id' => 'required',
            'varient_id' => 'required'
        ]);
        $cars = Product::findOrFail($id);
        $cars -> category_id = $request->category_id;
        $cars -> car_model_id = $request->car_model_id;
        $cars->varient_id = $request->varient_id;
        $cars->name= $request->name;
        $cars->transmission= $request->transmission;
        $cars->body= $request->body;
        $cars->about_car = $request->about_car;
        $cars->price = $request->price;
        $cars->route = $request->route;
        $cars->description = $request->description;
        $cars->color_name = $request->color_name;
        $cars->color_name2 = $request->color_name2;
        $cars->colour_code = $request->colour_code;
        $cars->colour_code2 = $request->colour_code2;
        $cars ->update();
        $imagename = Str::random($length = 10);
        if($request->has('images')){
            $img_del = Image::where('product_id',$id)->get();
            foreach($img_del as $img) {
                Storage::delete('/public/'.$img->images);
            }
            Image::where('product_id',$id)->delete();
            $files = $request->file('images');
            foreach ($files as $key => $file){
                $image = $imagename.'_'.$key .'_'.time().'.'. $file->getClientOriginalExtension();
                $path =  $file->storeAs('images',$image,'public');
               DB::table('images')->where('id',$id)->insert([
                    'product_id' => $cars->id,
                    'images' => $path,
                ]);
           }
        }
        return redirect('car')->with('updated', 'Updated successfully!');
    }

    public function destroy($id){
        $cars = Product::findOrFail($id);
        $img_del = Image::where('product_id',$cars->id)->get();
        foreach($img_del as $img) {
            Storage::delete('/public/'.$img->images);
        }
        Image::where('product_id',$cars->id)->delete();
        $cars->delete();
        return redirect('car');
    }

    public function findCategoryname(Request $request)
    {
        $category = CarModel ::select('title','id')->where('category_id',$request->id)->get();
        return response()->json($category);
    }


    public function findModelname(Request $request)
    {
        $id = $request->id;
        $model = Varient ::select('var_title','id')->where('car_model_id',$id)->get();
        return response()->json($model);
    }


}
