<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
     	'blood_type',
     	'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ailments(){
    	return $this->belongsToMany('App\Models\Ailment')->withTimestamps()->withPivot('current');
    }

    public function appointments(){
    	return $this->hasMany('App\Model\Appointment');
    }
}
