<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class swabtest_report extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'swab_result',
        'swab_proof',
        'swab_purok',
       ];
}
