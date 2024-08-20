<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['_token'];

    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'daily_rate',
        'status',
    ];
}
