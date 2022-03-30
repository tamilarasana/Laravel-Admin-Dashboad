<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Servicelist;

class ServiceListController extends Controller
{
    public function addService(Request $request,$id){
        $service_id = $request->id;
        $service_type = ServiceType::Where('id', $service_id)->exists();
        if($service_type)
        {
            $service_list = Servicelist::where('service_id',$id)->get();
            if(count($service_list)>0){
                $data = $service_list;
            } else {
                $data = '';
            }
        }
        return view('servicetype.addservice',['service' => $data,'service_id'=>$service_id]);
    }

    public function storeService(Request $request)
    {
        $service_id = $request->id;
         $service_type = Servicelist::where('service_id',$service_id)->exists();
         if($service_type)
         {
            $service_type = Servicelist::where('service_id',$service_id)->delete();
         }
            $input= $request->except('_token');
            Servicelist::insert($input['data']);
            return response()->json([
            'success'  => 'Data Added successfully.'
            ]);
    }

    public function delete($id)
    {
        $specname = Servicelist::findOrFail($id);
        $specname->delete();
        return response()->json([
            'success'  => 'Data Deleted successfully.'
           ]);
    }

}
