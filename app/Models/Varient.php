<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarModel;
use App\Models\Product;


class Varient extends Model
{
    use HasFactory;

    protected $fillable = ['car_model_id','var_title','description'];

    public $timestamps = false;

    public function carmodel(){
        return $this->belongsTo(CarModel::class,'car_model_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
