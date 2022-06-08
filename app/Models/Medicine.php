<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{   
    protected $table = 'medicine';
    protected $primaryKey = 'id';
    protected $fillable = ['medicine_name', 'symptoms_type'];
}
