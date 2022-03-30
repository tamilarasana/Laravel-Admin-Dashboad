<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSeason;
use App\Models\Product;
use DB;


class UpdateSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $updateseason = DB::table('product_season')
                            ->join('seasons','product_season.season_id','=','seasons.id')
                            ->join('products','product_season.product_id','=','products.id')
                            ->select('product_season.id','seasons.season_name','products.name','position')
                            ->get();
        return view('update-season.index',['updateseason'=>$updateseason]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $updateseason = DB::table('seasons')->get();
        $product = DB::table('products')->get();
        // dd($product);
         return view('update-season.create',['updateseason'=>$updateseason,'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_postion_exists = $request->position;
        if($check_postion_exists){
            $check_position = DB::table('product_season')
                                ->where('season_id',$request->season_id )
                                ->where('position', $request->position)->get();
            if($check_position->isEmpty()){
                $updateseason = array();
                $updateseason['season_id'] = $request->season_id;
                $updateseason['product_id'] = $request->product_id;
                $updateseason['position'] = $request->position;
                DB::table('product_season')->Insert($updateseason);
            }else{
                return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
             }
        }
        return redirect('update-season')->with('success', ' Season Inserted Successfully ');
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
        DB::table('product_season')->where('id',$id)->delete();
        return redirect('update-season');
    }
}
