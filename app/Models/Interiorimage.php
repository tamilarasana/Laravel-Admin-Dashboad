<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Interiorimage extends Model
{
    use HasFactory;

    protected $fillable = [
     'product_id',
     'title',
     'int_description',
     'interior_images',
 ];
 public $timestamps = false;

 public function product(){
     return $this->belongsTo(Product::class);
 }
}
