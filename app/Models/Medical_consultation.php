<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_consultation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'description',
    ];
}
