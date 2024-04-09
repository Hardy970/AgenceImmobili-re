<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected  $fillable = [
        'title',
        'description',
        'price',
        'bedrooms',
        'floor',
        'rooms',
        'postal_code',
        'city',
        'address',
        'surface',
        'sold'
    ];
}
