<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IconLocation;
use App\Models\Category;
use Str;
use Storage;

class IconLocationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iconlocation = IconLocation::all();
        // with('category')->get();
        return view('iconlocation.index',compact('iconlocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = Category::all();
        return view('iconlocation.create');
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
        if($request->hasFile('loc_image')){
           $loc_image = $imagename.'_'.time().'.'. request()->loc_image->getClientOriginalExtension();
           $path=   $request->loc_image->storeAs('iconlocation',$loc_image,'public');
           $loc_image = $path;
         }

        $iconlocation = new IconLocation;
        // $location->category_id = $request->category_id;
        $iconlocation->city = $request->city;
        $iconlocation->title = $request->title;
        $iconlocation->address = $request->address;
        $iconlocation->email = $request->email;
        $iconlocation->phone_number = $request->phone_number;
        $iconlocation->whatsapp = $request->whatsapp;
        $iconlocation->facebook_id = $request->facebook_id;
        $iconlocation->instagram_id = $request->instagram_id;
        $iconlocation->youtube_id = $request->youtube_id;
        $iconlocation->twitter_id = $request->twitter_id;
        $iconlocation->working_days = $request->working_days;
        $iconlocation->working_hours = $request->working_hours;
        $iconlocation->loc_image = $loc_image;
        $iconlocation->save();
        return redirect('iconlocation')->with('success', 'Created successfully!');
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
        $iconlocation = IconLocation::findOrfail($id);
        // $category = Category::all();
        return view('iconlocation.edit',['iconlocation' => $iconlocation]);
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
        $iconlocation = IconLocation::findOrFail($id);
        $image = $iconlocation ->loc_image;
        $imagename = Str::random($length = 10);
        if($request->hasFile('loc_image')){
            if($image){
                Storage::delete('/public/'.$image);
            }
                $loc_image = $imagename.'_'.time().'.'. request()->loc_image->getClientOriginalExtension();
                $path=   $request->loc_image->storeAs('iconlocation',$loc_image,'public');
                $locimage = $path;
        }
        if($request->has('city'))
         {
            $iconlocation->city = $request->city;
         }
        if($request ->has('title'))
         {
            $iconlocation->title = $request->title;
         }
        if($request -> has('address'))
         {
            $iconlocation->address = $request->address;
         }
        if($request->has('email'))
         {
            $iconlocation->email = $request->email;
         }
        if($request->has('phone_number'))
         {
            $iconlocation->phone_number = $request->phone_number;
         }
        if($request->has('whatsapp'))
         {
            $iconlocation->whatsapp = $request->whatsapp;
         }
        if($request->has('facebook_id'))
         {
            $iconlocation->facebook_id = $request->facebook_id;
         }
        if($request->has('instagram_id'))
         {
            $iconlocation->instagram_id = $request->instagram_id;
         }
        if($request->has('youtube_id'))
         {
             $iconlocation->youtube_id = $request->youtube_id;
         }
        if($request->has('twitter_id'))
         {
            $iconlocation->twitter_id = $request->twitter_id;
         }
        if($request->has('working_days'))
         {
           $iconlocation->working_days = $request->working_days;
         }
        if($request->has('working_hours'))
         {
            $iconlocation->working_hours = $request->working_hours;
         }
        if($request->has('loc_image'))
         {
            $iconlocation->loc_image = $locimage;
         }

        $iconlocation->update();
             return redirect('iconlocation')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iconlocation = IconLocation::findOrFail($id);
        $iconlocation->delete();
        Storage::delete('/public/'.$iconlocation->loc_image);
        return redirect('iconlocation');
    }
}
