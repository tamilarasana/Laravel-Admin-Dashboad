<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicefaq;


class ServicefaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicefaq = Servicefaq::all();
        return view('servicefaq.index',compact('servicefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicefaq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicefaq = New Servicefaq;
        $servicefaq->title = $request->title;
        $servicefaq->description = $request->description;
        $servicefaq->save();
     return redirect('servicefaq')->with('success', 'Created successfully!');
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
        $servicefaq = Servicefaq::findOrfail($id);
        return view('servicefaq.edit',['servicefaq' => $servicefaq]);
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
        $servicefaq = Servicefaq::findOrfail($id);
        $servicefaq->title = $request->title;
        $servicefaq->description = $request->description;
        $servicefaq->update();
        return redirect('servicefaq')->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicefaq = Servicefaq::findOrfail($id);
        $servicefaq->delete();
        return redirect('servicefaq')->with('success', 'Deleted successfully!');
    }
}

