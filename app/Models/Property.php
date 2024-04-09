<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'sold',
    ];
    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
    public function getSlug()
    {
        return Str::slug($this->title);
    }
}
