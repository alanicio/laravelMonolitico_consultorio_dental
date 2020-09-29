<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
    	'profesional_license',
        'specialty_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function specialty(){
    	return $this->belongsTo('App\Models\Specialty');
    }

    public function appointments(){
    	return $this->hasMany('App\Models\Appointment');
    }
}
