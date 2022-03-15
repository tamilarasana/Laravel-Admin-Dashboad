<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specname;

class SpecificationNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specnames = Specname::all();
        return view('specname.index',['specnames'=> $specnames]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('specname.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specname = new Specname;
        $specname->specname =  $request->specname;
        $specname->status =  $request->status;
        $specname->save();
        return redirect('specname')->with('success', 'Created successfully!');
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

        $specname = Specname::findOrFail($id);
        return view('specname.edit',['specname'=> $specname]);
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
        $specname = Specname::findOrFail($id);
         if($request->has('specname'))
         {
            $specname->specname = $request->specname;
         }
         if($request->has('status')){

             $specname->status =  $request->status;
         }
         $specname->update();
        return redirect('specname')->with('updated', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specname = Specname::findOrFail($id);
        $specname->delete();
        return redirect('specname');
    }
}
