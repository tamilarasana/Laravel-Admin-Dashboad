<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Interiorimage;
use Storage;

class ImageController extends Controller
{
     public function index()
    {
      $image = Image::all();
      return view('image.index', ['image'=> $image]);
    }

    public function create(){
        return view('image.create');
    }

    public function destroyImage(Image $image)
    {

        $image->delete();
        Storage::delete('/public/'.$image->images);
        return redirect('car')->with('success', 'Image Deleted Successfullly');
    }

    public  function destroyInteriorImage( $id){

        $interior = Interiorimage::findOrFail($id);
        $interior->delete();
        return response()->json([
            'success'  => 'Data Deleted successfully.'
           ]);
    }
}
