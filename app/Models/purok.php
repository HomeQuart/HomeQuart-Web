<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purok extends Model
{
    protected $table = 'purok';
    protected $primaryKey = 'id';
    protected $fillable = ['purok_name', 'comp_address', 'positive_counter'];
}
