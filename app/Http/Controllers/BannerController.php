<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use File;
use Storage;
use Str;
use Brian2694\Toastr\Facades\Toastr;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $banners = Banner::all();
      return view('banner.index', ['banners'=> $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            $check_position =Banner::where('type',$request->type)->where('position', $request->position)->get();
            if($check_position->isEmpty()){
                $imagename = Str::random($length = 10);
                if($request->hasFile('banner_img')){
                   $banner_img = $imagename.'_'.time().'.'. request()->banner_img->getClientOriginalExtension();
                   $path=   $request->banner_img->storeAs('banner',$banner_img,'public');
                   $banner_img = $path;
                 }
                 $banner = new Banner;
                 $banner->position = $request->position;
                 $banner->type = $request->type;
                 $banner->banner_img = $banner_img;
                 $banner->save();

            }else{
                 return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
                }
        }
        return redirect('banner')->with('success', 'Created successfully!');
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

      // $banners = Banner::findOrFail($id);
      // return view('banner.edit', ['banners'=> $banners]);

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

        $banner = Banner::findOrFail($id);
        if($request->has('position'))
         {
            $banner->position = $request->position;
         }
         if($request->has('type'))
         {
            $banner->type = $request->type;
         }
         if($request->has('banner_img'))
         {
            $banner->banner_img = $request->banner_img  ->store('public');
         }

        $banner->save();
        return $banner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Storage::delete('/public/'.$banner->banner_img);
        return redirect('banner');
    }
}

