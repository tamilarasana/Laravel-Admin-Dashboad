<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Varient;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Spec;

use DB;



class VarientController extends Controller
{
    public function index (){

        $varient =  Varient::with('carmodel')->get();
        return view('varient.index',compact('varient'));
    }

    public function create(){
        $model =  CarModel::all();
        return view ('varient.create')->with('models',$model);
    }

    public function store(Request $request){
        $data['car_model_id']= $request->car_model_id;
        $data['var_title']= $request->var_title;
        $data['description'] =  $request ->description;
        $varient = varient::create($data);
        return redirect('varients')->with('success', 'Created successfully!');
    }

    public function edit($id){
        $varient = Varient::find($id);
        $models = CarModel::all();
        $category = Category::all();

        // $varient = Varient::with('carmodel')->where('carmodel_id', $id)->get();
        // with('carmodel')->where('carmodel_id', $id)->get();
     // foreach ($varient as $key => $value) {
     //     dd($value->carmodel->title);
     //          }

        return view('varient.edit',[ 'category',$category,'varient' => $varient,'models' => $models]);
    }

    public function update(Request $request,$id){
        $varient = Varient::find($id);
        if($request->has('car_model_id')){
            $varient->carmodel_id = $request->car_model_id;
        }
        if($request->has('var_title')){
            $varient->var_title = $request->var_title;
        }
        if($request->has('description')){
            $varient->description = $request->description;
        }
        $varient->update();
        return redirect('varients')->with('updated', 'Updated successfully!');
    }

    public function destroy($id){
        $varient = Varient::findOrFail($id);
        $varient->delete();
        return redirect('varients');
    }


    public function getspecification ($id){
        $varient_id = $id;
        $spectable = DB::table('specnames')->join('specs','specnames.id','=','specs.specname_id')
                   ->where('specs.varient_id',$varient_id)->get();
        $vari =  Varient::all();
        $specifications = DB::table('specnames')->select('id','specname')->get();
        $specname = DB::table('specs')
                        ->select('specs.id as speval_id','specs.specname_id','specs.value')->join('specnames','specnames.id','=','specs.specname_id')->where('specs.varient_id',$varient_id)->get();
        if(count($spectable) == 0){
            $page_type= "add";
        }
        else{
            $page_type= "edit";
        }

         $specification_fields = [];

        foreach($specifications as $key=>$spec)
        {
            $specification_fields[$key]['specid']  = $spec->id;
            $specification_fields[$key]['specname']  = $spec->specname;

            foreach($specname as $specvalues){
                if($spec->id == $specvalues->specname_id){
                    $specification_fields[$key]['speval_id'] = $specvalues->speval_id;
                    $specification_fields[$key]['value'] = $specvalues->value;
                }
            }
        }
         return view('varient.spec',[ 'vari'=> $vari,'varient_id' => $varient_id,'specification_fields' => $specification_fields , 'page_type' =>$page_type]);
    }
    public function SpecificationDetails(Request $request) {
        $varient_id = $request->varient_id;
        $spectable = DB::table('specnames')->join('specs','specnames.id','=','specs.specname_id')
        ->where('specs.varient_id',$varient_id)->get();
        // print("<pre>");print_r($spectable);die;
        $vari =  Varient::all();
        $specifications = DB::table('specnames')->select('id','specname')->get();
        $specname = DB::table('specs')
                        ->select('specs.id as speval_id','specs.specname_id','specs.value')->join('specnames','specnames.id','=','specs.specname_id')
            ->where('specs.varient_id',$varient_id)->get();
        if(count($spectable) == 0){
            $page_type= "add";
        }
        else{
            $page_type= "edit";
        }
         $specification_fields = [];

        foreach($specifications as $key=>$spec)
        {
            $specification_fields[$key]['specid']  = $spec->id;
            $specification_fields[$key]['specname']  = $spec->specname;

            foreach($specname as $specvalues){
                if($spec->id == $specvalues->specname_id){
                    $specification_fields[$key]['speval_id'] = $specvalues->speval_id;
                    $specification_fields[$key]['value'] = $specvalues->value;
                }
            }
        }
       return $specification_fields;

    }

}
