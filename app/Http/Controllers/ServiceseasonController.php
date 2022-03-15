<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Storage;
use App\Models\Serviceseason;
use App\Models\Service;


class ServiceseasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceseason = Serviceseason::with('service')->get();
        return view('serviceseason.index',compact('serviceseason'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::all();
        return view('serviceseason.create',['service' => $service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceseason = new Serviceseason;
        $serviceseason->season_title = $request->season_title;
        $serviceseason->description = $request->description;
        $serviceseason->service_id = $request->service_id;
        $serviceseason->status = $request->status;
        $serviceseason->save();
        return redirect('serviceseason')->with('success', 'Created successfully!');
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
        $serviceseason = Serviceseason::findOrfail($id);
        $service = Service::all();
        return view('serviceseason.edit',['serviceseason' => $serviceseason, 'service' => $service]);
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
        $serviceseason = Serviceseason::findOrFail($id);
        $serviceseason->season_title = $request->season_title;
        $serviceseason->description = $request->description;
        $serviceseason->service_id = $request->service_id;
        $serviceseason->status = $request->status;
        $serviceseason->update();
        return redirect('serviceseason')->with('updated', 'Updated successfully!');
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceseason = Serviceseason::findOrFail($id);
        $serviceseason->delete();
        return redirect('serviceseason');
    }
}
