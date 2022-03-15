<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attacheseasonservice;
use App\Models\Service;

class Serviceseason extends Model
{
    use HasFactory;

    protected $table = 'serviceseasons';

    protected $fillable = ['season_title','description','service_id','status'];

    public $timestamps = false;

    public function service(){
        return $this->belongsTo(Service::class);
    }
    // public function attacheseason(){
    //     return $this->hasMany(Attacheseasonservice::class);
    // }
    // public function service(){
    //     return $this->belongsToMany(Service::class);
    // }
}
