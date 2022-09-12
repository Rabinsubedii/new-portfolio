<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sensor;

class Company extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function sensor(){
        return $this->hasMany(Sensor::class);
    }
}
