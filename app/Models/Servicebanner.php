<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicebanner extends Model
{
    use HasFactory;

    protected $table = 'servicebanners';

    protected $fillable = [ 'position','service_banner','status' ];

    public $timestamps = false;

}
