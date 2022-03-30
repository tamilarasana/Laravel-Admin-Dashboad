<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicebanner;
use File;
use Storage;
use Str;
use Brian2694\Toastr\Facades\Toastr;


class ServicebannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicebanner  = Servicebanner::all();
        // dd($servicebanner);
        return view('servicebanner.index',compact('servicebanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicebanner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $check_postion_exists = $request->position;
        if($check_postion_exists){
            $check_position =Servicebanner::where('status',$request->status)->where('position', $request->position)->get();
            if($check_position->isEmpty()){
                $imagename = Str::random($length = 10);
                if($request->hasFile('service_banner')){
                   $service_banner = $imagename.'_'.time().'.'. request()->service_banner->getClientOriginalExtension();
                   $path=   $request->service_banner->storeAs('service_banner',$service_banner,'public');
                   $service_banner = $path;
                 }

                 $servicebanner = new Servicebanner;
                 $servicebanner->position = $request->position;
                 $servicebanner->status = $request->status;
                 $servicebanner->service_banner = $service_banner;
                 $servicebanner->save();
            }else{
                 return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
                }
        }
        return redirect('servicebanner')->with('success', 'Created successfully!');

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
        $servicebanner =Servicebanner::findOrFail($id);
         return view('servicebanner.edit',compact('servicebanner'));
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicebanner = Servicebanner::findOrFail($id);
        $servicebanner->delete();
        Storage::delete('/public/'.$servicebanner->service_banner);
        return redirect('servicebanner');
    }
}
