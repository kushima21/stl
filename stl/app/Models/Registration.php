<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'complete_name',
        'username',
        'phone_number',
        'password',
        'location',
        'area_location',
        'area_name',
        'position',
        'status',
    ];
    
}


