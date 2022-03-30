<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpage extends Model
{
    use HasFactory;

    protected $table = 'blogpages';

    protected $fillable = [ 'title','position','blogpage_link','row_position' ];

    public $timestamps = false;
}

