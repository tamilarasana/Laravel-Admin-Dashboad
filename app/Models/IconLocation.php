<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'title',
        'address',
        'phone_number',
        'email',
        'whatsapp',
        'facebook_id',
        'instagram_id',
        'youtube_id',
        'twitter_id',
        'loc_image',
        'working_days',
        'working_hours'
    ];

    public $timestamps = false;
}
