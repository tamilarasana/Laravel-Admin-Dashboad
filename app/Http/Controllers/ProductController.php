<?php

namespace App\Http\Controllers;

use DB;
use Str;
use File;
use Storage;
use Exception;
use App\Models\Image;
use App\Models\Product;
use App\Models\Varient;
use App\Models\CarModel;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Interiorimage;

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

        //  dd($request->all());
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
          if($request->has('images')){
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

            $product_id = $cars->id;
            $input = $request->except('_token');
            $test = $input['data'];
             $imagename = Str::random($length = 10);
            foreach($test as $key => $tes){
                try{
                    $imge =  $tes['interior_images'];
                    // dd($imge);
                    if($imge){
                        $banner_image = $imagename.'_'.$key.'_'.time().'.'.$imge->getClientOriginalExtension();
                        $path=   $imge->storeAs('interiorimages',$banner_image,'public');
                        $loc_image = $path;
                    }
                   $tes['product_id'] = $product_id;
                   $tes['interior_images'] = $loc_image;
                    $res = Interiorimage::insert($tes);
                }catch (Exception $e){
                    dd($e);
                }

            }

        //    $dt = Interiorimage::insert($test);
        //    dd($dt);



            // $product_id = $cars->id;
            // $title = $request->title;
            // $imagename = Str::random($length = 10);
            // if($request->hasFile('interior_images')){
            //     $files = $request->file('interior_images');
            //     foreach ($files as $key => $file)
            //     {
            //         $image = $imagename.'_'.$key .'_'.time().'.'. $file->getClientOriginalExtension();
            //         $path =  $file->storeAs('interiorimages',$image,'public');
            //         $loc_image = $path;
            //     }
            //  }
            // for($i=0; $i<count($title); $i++){
            //     $data=array(
            //         'product_id' => $product_id,
            //         'title' => $title[$i],
            //         'interiorimages' => $loc_image,
            //     );
            // $insert[] = $data;
            // }
            // Interiorimage::insert($insert);

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
        $interior = Interiorimage::where('product_id',$cars->id)->get();
        // dd($interior);
        return view('cars.edit',['cars' => $cars,'models' => $models ,'varient' => $varient, 'category' => $category ,  'interior' => $interior]);
    }

    public function update(Request $request, $id){
        // dd($request->all());
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

        $interior = Interiorimage::where('product_id',$cars->id)->exists();
        // dd($interior);
        if($interior)
        {
           $exists_int = Interiorimage::where('product_id',$cars->id)->delete();
        }
        $product_id = $cars->id;
        $input = $request->except('_token');
        $test = $input['data'];
         $imagename = Str::random($length = 10);
        foreach($test as $key => $tes){
            try{
                $imge =  $tes['interior_images'];
                // dd($imge);
                if($imge){
                    $banner_image = $imagename.'_'.$key.'_'.time().'.'.$imge->getClientOriginalExtension();
                    $path=   $imge->storeAs('interiorimages',$banner_image,'public');
                    $loc_image = $path;
                }
               $tes['product_id'] = $product_id;
               $tes['interior_images'] = $loc_image;
                $res = Interiorimage::insert($tes);
            }catch (Exception $e){
                dd($e);
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

        $interiorimg_del = Interiorimage::where('product_id',$cars->id)->get();
        foreach($interiorimg_del as $img) {
            Storage::delete('/public/'.$img->interiorimages);
        }

        Interiorimage::where('product_id',$cars->id)->delete();
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
