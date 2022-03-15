<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Location;
use File;
use Storage;
use Str;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location =  Location::with('category')->get();
        // return response()->json($location);
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
        return view('location.create',['category'=> $category]);
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
           $image_path=   $request->image->storeAs('location',$image,'public');
           $loc_image = $image_path;
         }

        $location = New Location;
        $location->city =  $request->city;
        $location->category_id =  $request->category_id;
        $location->location_name =  $request->location_name;
        $location->phone =  $request->phone;
        $location->alternate_phone =  $request->alternate_phone;
        $location->address =  $request->address;
        $location->pincode =  $request->pincode;
        $location->powered_by =  $request->powered_by;
        $location->rating =  $request->rating;
        $location->type =  $request->type;
        $location->map_link =  $request->map_link;
        $location->review_form_link =  $request->review_form_link;
        $location->latitude =  $request->latitude;
        $location->longtitude =  $request->longtitude;
        $location->website =  $request->website;
        $location->email =  $request->email;
        $location->open_time =  $request->open_time;
        $location->close_time =  $request->close_time;
        $location->image =  $loc_image;
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
        $location =  Location::findORfail($id);
        $category = Category::all();
        return view('location.edit',['location' => $location,'category'=>$category]);
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
        $location =  Location::findORfail($id);
        $loc_img =  $location->image;
        $imagename = Str::random($length = 10);
        if($request->hasFile('image')){
            if($loc_img){
                Storage::delete('/public/'.$loc_img);
            }
            $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
           $image_path=   $request->image->storeAs('location',$image,'public');
           $image = $image_path;
         }

        $location->city =  $request->city;
        $location->category_id =  $request->category_id;
        $location->location_name =  $request->location_name;
        $location->phone =  $request->phone;
        $location->alternate_phone =  $request->alternate_phone;
        $location->address =  $request->address;
        $location->pincode =  $request->pincode;
        $location->powered_by =  $request->powered_by;
        $location->rating =  $request->rating;
        $location->type =  $request->type;
        $location->map_link =  $request->map_link;
        $location->review_form_link =  $request->review_form_link;
        $location->latitude =  $request->latitude;
        $location->longtitude =  $request->longtitude;
        $location->website =  $request->website;
        $location->email =  $request->email;
        $location->open_time =  $request->open_time;
        $location->close_time =  $request->close_time;
        $location->image =  $image;
        $location->update();
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
        $location =  Location::findORfail($id);
        $location->delete();
        return redirect('location');
    }
}


// public function update(Request $request, $id)
// {
//     $location =  Location::findORfail($id);
//     $loc_img =  $location->image;
//     $imagename = Str::random($length = 10);
//     if($request->hasFile('image')){
//         if($loc_img){
//             Storage::delete('/public/'.$loc_img);
//         }
//         $image = $imagename.'_'.time().'.'. request()->image->getClientOriginalExtension();
//        $image_path=   $request->image->storeAs('location',$image,'public');
//        $locimage = $image_path;
//     }
//      $location->update([
//         'city' =>$request->city,
//         'category_id' => $request->category_id,
//         'location_name' => $request->location_name,
//         'phone' => $request->phone,
//         'alternate_phone' => $request->alternate_phone,
//         'address' => $request->address,
//         'pincode' => $request->pincode,
//         'powered_by' => $request->powered_by,
//         'rating' => $request->rating,
//         'type' => $request->type,
//         'map_link' => $request->map_link,
//         'review_form_link' => $request->review_form_link,
//         'latitude' => $request->latitude,
//         'longtitude' => $request->longtitude,
//         'website' => $request->website,
//         'email' => $request->email,
//         'open_time' => $request->open_time,
//         'close_time' => $request->close_time,
//         'image' => $locimage
//     ]);
//     return redirect('location')->with('updated', 'Updated successfully!');
// }
