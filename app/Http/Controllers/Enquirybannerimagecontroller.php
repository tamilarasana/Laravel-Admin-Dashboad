<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquirybanner;
use Str;
use Storage;
class Enquirybannerimagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $enquirybanner = Enquirybanner::all();
        return view('enquirybanner.index', compact('enquirybanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enquirybanner.create');

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
        if($request->hasFile('banner_img')){
           $banner_image = $imagename.'_'.time().'.'. request()->banner_img->getClientOriginalExtension();
           $path=   $request->banner_img->storeAs('Enq_banner',$banner_image,'public');
           $enq_banner = $path;
         }
         $banner = new Enquirybanner;
         $banner->banner_img = $enq_banner;
         $banner->save();
         return redirect('enquirybannerimg')->with('success', 'Created successfully!');
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
        $enquirybanner = Enquirybanner::findOrfail($id);
        return view('enquirybanner.edit',['enquirybanner' => $enquirybanner]);
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
        $enquiry_banner= Enquirybanner::findOrFail($id);
        $image = $enquiry_banner ->banner_img;
        $imagename = Str::random($length = 10);
         if($request->hasFile('banner_img')){
             if($image){
                 Storage::delete('/public/'.$image);
             }
              $image = $imagename.'_'.time().'.'. request()->banner_img->getClientOriginalExtension();
              $path=   $request->banner_img->storeAs('Enq_banner',$image,'public');
               $image = $path;
         }
         $enquiry_banner ->update([
             'banner_img' => $image
         ]);
        return redirect('enquirybannerimg')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Enquirybanner::findOrFail($id);
        $banner->delete();
        Storage::delete('/public/'.$banner->banner_img);
        return redirect('enquirybannerimg');
    }
}
