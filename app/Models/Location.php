<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'location_name',
        'phone',
        'alternate_phone',
        'address',
        'pincode',
        'powered_by',
        'rating',
        'type',
        'map_link',
        'review_form_link',
        'latitude',
        'longtitude',
        'category_id',
        'website',
        'email',
        'open_time',
        'close_time',
        'image'

    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
