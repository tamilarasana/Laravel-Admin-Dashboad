<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicevideo extends Model
{
    use HasFactory;

    protected $table = 'servicevideos';

    protected $fillable = [ 'position','youtube_link','status' ];

    public $timestamps = false;
}
