<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\CarModel;
use App\Models\Colour;
use App\Models\Varient;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'car_model_id',
        'varient_id',
        'name',
        'transmission',
        'body',
        'about_car',
        'price',
        'route',
        'description',
        'color_name',
        'color_name2',
        'colour_code',
        'colour_code2'

    ];

    public $timestamps = false;

    public function category()    {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function carmodel(){
        return $this->belongsTo(CarModel::class,'car_model_id');
    }

    public function varient(){
        return $this->belongsTo(Varient::class);
    }

    public function interiorimages(){
        return $this->hasMany(Interiorimage::class);
    }





}
