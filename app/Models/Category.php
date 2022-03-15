<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\CarModel;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['cat_image', 'title','cat_logo','status'
];

    public function carmodel(){
        return $this->hasMany(CarModel::class);
    }
    public function location(){
        return $this->hasMany(Location::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
