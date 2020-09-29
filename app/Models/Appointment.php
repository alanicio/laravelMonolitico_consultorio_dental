<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

     protected $fillable = [
    	'date',
    	'patient_id',
    	'medical_consultation_id',
    	'doctor_id',
    ];

    public function doctor(){
    	return $this->belongsTo('App\Models\Doctor');
    }

    public function medical_consultation(){
    	return $this->belongsTo('App\Models\Medical_consultation');
    }

    public function patient(){
    	return $this->belongsTo('App\Models\Patient');
    }
}
