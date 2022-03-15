<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceType;

class Servicelist extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id','service',
    ];

    public function servicetype(){
        return $this->belongsTo(ServiceType::class);
    }
}
