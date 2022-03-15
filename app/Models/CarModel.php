<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Varient;
use App\Models\Product;
use App\Models\Colour;
use App\Models\Category;


class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [ 'category_id','title','starting_price','seo_title','seo_tag','seo_desc','position','description','image',  'file'];

    public $timestamps = false;

    public function varient(){
        return $this->hasMany(Varient::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function colours(){
        return $this->hasMany(Colour::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
