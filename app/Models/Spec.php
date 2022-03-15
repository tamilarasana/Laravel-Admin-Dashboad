<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specname;

class Spec extends Model
{
    use HasFactory;
    protected $fillable = ['specname_id','specname','varient_id','value', 'status'];

    public $timestamps = false;

    public function specname(){
        return $this->belongsTo(Specname::class);
    }

}
