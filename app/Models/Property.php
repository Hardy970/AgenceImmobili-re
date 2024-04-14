<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    public function scopeAvailable(Builder $builder)
    {
       return $builder->where('sold',false);
    }
    public function scopeRecent(Builder $builder)
    {
        return $builder->orderBy('created_at','desc');
    }
    protected $casts=[
        'sold'=>'integer',
        'created_at'=>'string'
    ];
   
}
