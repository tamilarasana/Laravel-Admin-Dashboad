<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ServiceServiceseason;
use  App\Models\Serviceseason;
use  App\Models\Service;
use Illuminate\Support\Facades\DB;


class AttachseasonserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attacheseason = ServiceServiceseason::with(['service','serviceseason'])->get();
        return view('attachserviceseason.index',compact('attacheseason'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceseason = Serviceseason::all();
        $service = Service::all();
        return view('attachserviceseason.create',['serviceseason'=>$serviceseason,'service'=>$service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceseason = new ServiceServiceseason;
        $serviceseason->service_id = $request->service_id;
        $serviceseason->serviceseason_id = $request->serviceseason_id;
        $serviceseason->save();
        return redirect('attachseasonservice')->with('success', 'Updated successfully!');
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
        //
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
        $serviceseason = ServiceServiceseason::findOrFail($id);
        $serviceseason->delete();
        return redirect('attachseasonservice');
    }
}
