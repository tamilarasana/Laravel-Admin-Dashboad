<?php

namespace App\Http\Controllers;

use App\Models\Policybanner;
use Illuminate\Http\Request;
use Str;
use Storage;

class PolicybannerimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policybanner = Policybanner::all();
        return view('policybanner.index',compact('policybanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('policybanner.create');
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
        if($request->hasFile('policy_img')){
           $banner_image = $imagename.'_'.time().'.'. request()->policy_img->getClientOriginalExtension();
           $path=   $request->policy_img->storeAs('policy_banner',$banner_image,'public');
           $policy_banner = $path;
         }
         $banner = new Policybanner;
         $banner->policy_img = $policy_banner;
         $banner->save();
         return redirect('policybannerimg')->with('success', 'Created successfully!');
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
        $policybanner = Policybanner::findOrfail($id);
        return view('policybanner.edit',['policybanner' => $policybanner]);
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
        $policy_banner= Policybanner::findOrFail($id);
        $image = $policy_banner ->policy_img;
        $imagename = Str::random($length = 10);
         if($request->hasFile('policy_img')){
             if($image){
                 Storage::delete('/public/'.$image);
             }
              $image = $imagename.'_'.time().'.'. request()->policy_img->getClientOriginalExtension();
              $path=   $request->policy_img->storeAs('policy_banner',$image,'public');
               $image = $path;
         }
         if($request->has('policy_img')){
            $policy_banner->policy_img = $image;
        }
        $policy_banner->update();

        return redirect('policybannerimg')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy_banner = Policybanner::findOrFail($id);
        $policy_banner->delete();
        Storage::delete('/public/'.$policy_banner->policy_img);
        return redirect('policybannerimg');
    }
}
