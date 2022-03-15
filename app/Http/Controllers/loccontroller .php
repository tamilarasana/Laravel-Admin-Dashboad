<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;
use Str;
use Storage;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::with('category')->get();
        return view('location.index',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('location.create' ,['category'=> $category]);
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
           $path=   $request->loc_image->storeAs('location',$loc_image,'public');
           $loc_image = $path;
         }

        $location = new Location;
        $location->category_id = $request->category_id;
        $location->title = $request->title;
        $location->address = $request->address;
        $location->email = $request->email;
        $location->phone_number = $request->phone_number;
        $location->whatsapp = $request->whatsapp;
        $location->facebook_id = $request->facebook_id;
        $location->loc_image = $loc_image;
        $location->save();
        return redirect('location')->with('success', 'Created successfully!');
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
        $location = Location::findOrfail($id);
        $category = Category::all();
        return view('location.edit',['location' => $location, 'category' => $category]);
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
        $location = Location::findOrFail($id);
       $image = $location ->loc_image;
       $imagename = Str::random($length = 10);
        if($request->hasFile('loc_image')){
            if($image){
                Storage::delete('/public/'.$image);            }
                $loc_image = $imagename.'_'.time().'.'. request()->loc_image->getClientOriginalExtension();
                $path=   $request->loc_image->storeAs('location',$loc_image,'public');
                $loc_image = $path;
        }
        $location ->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'whatsapp' => $request->whatsapp,
            'facebook_id' => $request->facebook_id,
            'loc_image' => $loc_image,
        ]);
             return redirect('location')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        Storage::delete('/public/'.$location->loc_image);
        return redirect('location');
    }
}
