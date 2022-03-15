<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquirybanner extends Model
{
    use HasFactory;

    protected $table = 'enquirybanners';

    protected $fillable = ['banner_img'];

    public $timestamps = false;
}
