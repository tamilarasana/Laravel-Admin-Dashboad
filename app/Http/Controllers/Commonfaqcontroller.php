<?php

namespace App\Http\Controllers;

use App\Models\Commonfaq;
use Illuminate\Http\Request;

class Commonfaqcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commonfaq = Commonfaq::all();
        return view('commonfaq.index',compact('commonfaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commonfaq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commonfaq = New Commonfaq;
        $commonfaq->title = $request->title;
        $commonfaq->description = $request->description;
        $commonfaq->save();
     return redirect('commonfaq')->with('success', 'Created successfully!');
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
        $commonfaq = Commonfaq::findOrfail($id);
        // $category = Category::all();
        return view('commonfaq.edit',['commonfaq' => $commonfaq]);
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
        $commonfaq = Commonfaq::findOrfail($id);
        $commonfaq->title = $request->title;
        $commonfaq->description = $request->description;
        $commonfaq->update();
        return redirect('commonfaq')->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commonfaq = Commonfaq::findOrfail($id);
        $commonfaq->delete();
        return redirect('commonfaq')->with('success', 'Deleted successfully!');
    }
}
