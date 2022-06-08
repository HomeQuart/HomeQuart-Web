<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_reports extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'temp_proof',
        'temp_input',
        'patient_symptoms',
        'patient_medicine',
       ];
}
