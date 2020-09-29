<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
     	'name',
     	'description',
    ];

    public function doctors(){
    	return $this->hasMany('app\Models\Doctor');
    }

    public function medical_consultations(){
    	return $this->hasMany('App\Model\Medical_consultation');
    }
}
