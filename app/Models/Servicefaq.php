<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicefaq extends Model
{
    use HasFactory;

    protected $table = 'servicefaqs';

    protected $fillable = ['title','description'];

    public $timestamps = false;

}
