<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Servicelist;


class ServiceType extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'warranty','service_period','title', 'duration','image'];

    public $timestamps = false;


    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function servicelist (){
        return $this->hasMany(Servicelist::class, 'service_id');
    }
}
