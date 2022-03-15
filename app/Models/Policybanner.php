<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policybanner extends Model
{
    use HasFactory;
    protected $table = 'policybanners';

    protected $fillable = ['policy_img'];

    public $timestamps = false;
}
