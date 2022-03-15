<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use File;
use Storage;
use Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('services.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $imagename = Str::random($length = 10);
        if($request->hasFile('image')){
           $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
           $path=   $request->image->storeAs('service',$image,'public');
           $image = $path;
         }
        $service = new Service;
        $service->title = $request->title;
        $service->status = $request->status;
        $service->description = $request->description;
        $service->image = $image;
        $service->save();
        return redirect('service')->with('success', 'Created successfully!');

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
        $service = Service::findOrFail($id);
        return view('services.edit',compact('service'));

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
       $service = Service::findOrFail($id);
       $image = $service ->image;
       $imagename = Str::random($length = 10);
        if($request->hasFile('image')){
            if($image){
                Storage::delete('/public/'.$image);            }
                $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
                $path=   $request->image->storeAs('service',$image,'public');
                $image = $path;
        }
        $service ->update([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $image,
        ]);
             return redirect('service')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        Storage::delete('/public/'.$service->image);
        return redirect('service');

    }
}
