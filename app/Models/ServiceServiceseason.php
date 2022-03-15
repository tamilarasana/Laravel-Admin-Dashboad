<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Serviceseason;

class ServiceServiceseason extends Model
{
    use HasFactory;
    protected $table = 'service_serviceseason';
    protected $fillable = ['service_id','serviceseason_id'];
    public $timestamps = false;

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function serviceseason(){
        return $this->belongsTo(Serviceseason::class);
    }
}
