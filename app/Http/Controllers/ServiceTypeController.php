<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use File;
use Storage;
use Str;
use DB;
use App\Models\Servicelist;
use App\Models\Service;


class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceType = ServiceType::with('servicelist')->get();
        // dd($serviceType);
        return view('servicetype.index',compact('serviceType'));
    }

     public function create()
    {
        $service = Service::all();
          return view('servicetype.create')->with('service',$service);
    }

     public function store(Request $request)
    {
        $imagename = Str::random($length = 10);
        if($request->hasFile('image')){
           $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
           $path=   $request->image->storeAs('serviceType',$image,'public');
           $image = $path;
         }
        $service = new ServiceType;
        $service->service_id = $request->service_id;
        $service->title = $request->title;
        $service->warranty = $request->warranty;
        $service->service_period = $request->service_period;
        $service->duration = $request->duration;
        $service->image = $image;
        $service->save();

         return redirect('servicetype');
    }

    public function edit($id)
    {
        $serviceType =  ServiceType::findOrFail($id);
        $service = Service::all();
        return view('servicetype.edit',['service' => $service,'serviceType' => $serviceType]);
    }

    public function update(Request $request, $id)
    {
       $servicetype = ServiceType::findOrFail($id);
       $image = $servicetype ->image;
       $imagename = Str::random($length = 10);
        if($request->hasFile('image')){
            if($image){
                Storage::delete('/public/'.$image);            }
             $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
           $path=   $request->image->storeAs('serviceType',$image,'public');
              $image = $path;
        }
        $servicetype ->update([
            'title' => $request->title,
            'service_id' => $request->service_id,
            'warranty' => $request-> warranty,
            'service_period' => $request-> service_period,
            'duration' => $request-> duration,
            'image' => $image,
        ]);
                 return redirect('servicetype');

    }

    public function destroy ($id){
          $servicetype = ServiceType::findOrFail($id);
          $servicetype->delete();
          Storage::delete('/public/'.$servicetype->image);
          return redirect('servicetype');
    }

    // public function addService(Request $request,$id){
    //     $basket_id = $request->id;
    //     $baskset_cat = ServiceType::Where('id', $basket_id)->exists();
    //     if($baskset_cat)
    //     {
    //         $basket_data = Servicelist::where('service_id',$id)->get();
    //         if(count($basket_data)>0){
    //             $data = $basket_data;
    //         } else {
    //             $data = '';
    //         }
    //     }
    //     return view('servicetype.addservice',['basket' => $data,'basket_id'=>$basket_id]);
    // }

    // public function storeService(Request $request)
    // {
    //     $basket_id = $request->id;
    //      $basket_data = Servicelist::where('service_id',$basket_id)->exists();
    //      if($basket_data)
    //      {
    //         $basket_data = Servicelist::where('service_id',$basket_id)->delete();
    //      }
    //         $input= $request->except('_token');
    //         Servicelist::insert($input['data']);
    //         return response()->json([
    //         'success'  => 'Data Added successfully.'
    //         ]);
    // }

    // public function delete($id)
    // {
    //     $specname = Servicelist::findOrFail($id);
    //     $specname->delete();
    //     return response()->json([
    //         'success'  => 'Data Deleted successfully.'
    //        ]);
    // }

}
