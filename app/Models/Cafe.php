<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'status',
        'name',
        'image',
        'rating',
        'latitude',
        'longitude',
        'min_order',
        'delivery_price',
        'time_delivery'
    ];
}
