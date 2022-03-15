<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Varient;
use App\Models\Carmodel;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [ 'carmodel_id','varient_id',   'product_id', 'color_code', 'color_name',];

    public $timestamps = false;

    public function car(){
        return $this->belongsTo(Product::class ,'product_id');
    }

    public function varient(){
        return $this->belongsTo(Varient::class,'varient_id' );
    }

    public function model(){
        return $this->belongsTo(Carmodel::class,'carmodel_id');
    }
}
