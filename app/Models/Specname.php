<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spec;

class Specname extends Model
{
    use HasFactory;
    protected $fillable = ['specname','status'];

    public $timestamps = false;

    public function specs(){
        return $this->hasMany(Spec::class);
    }
}
