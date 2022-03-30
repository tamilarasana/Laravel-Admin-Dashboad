<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicevideo;
use File;
use Storage;
use Str;
use Brian2694\Toastr\Facades\Toastr;

class ServicevideoController extends Controller
{
    public function index()
    {
        $servicevideo  = Servicevideo::all();
        return view('servicevideo.index',compact('servicevideo'));
    }

    public function create()
    {
        return view('servicevideo.create');
    }

    public function store(Request $request){

        $check_postion_exists = $request->position;
        if($check_postion_exists){
            $check_position =Servicevideo::where('position',$request->position)->where('position', $request->position)->get();
                if($check_position->isEmpty()){
                    $servicevideo = new Servicevideo;
                    $servicevideo->position = $request->position;
                    $servicevideo->status = $request->status;
                    $servicevideo->youtube_link = $request->youtube_link;
                    $servicevideo->save();
                }else{
                        return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
                    }
        }
        return redirect('servicevideo')->with('success', 'Created successfully!');
    }

    public function destroy($id)
    {
        $servicevideo = Servicevideo::findOrFail($id);
        $servicevideo->delete();
        return redirect('servicevideo');
    }

}
