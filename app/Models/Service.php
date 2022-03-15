<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceType;
use  App\Models\Attacheseasonservice;
use  App\Models\Serviceseason;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','status' ,'description'];

    public $timestamps = false;

    public function servicetype(){
        return $this->hasMany(ServiceType::class);
    }

}

