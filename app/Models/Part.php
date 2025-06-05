<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //

    protected $guarded = [];


    protected function casts(): array
    {
        return [
            'name' => 'array',
            'description' => 'array'
        ];
    }

    function type()
    {
        return $this->belongsTo(Type::class)->withDefault();
    }

    function reviews()
    {
        return $this->hasMany(Review::class);
    }

    function payments()
    {
        return $this->hasMany(Payment::class);
    }

    function getTransNameAttribute()
    {
        return $this->name[app()->getLocale()] ?? '';
    }

    function getNameEnAttribute()
    {
        return $this->name['en'] ?? '';
    }

    function getNameArAttribute()
    {
        return $this->name['ar'] ?? '';
    }

    function getTransDescriptionAttribute()
    {
        return $this->description[app()->getLocale()] ?? '';
    }

    function getDescriptionEnAttribute()
    {
        return $this->description['en'] ?? '';
    }

    function getDescriptionArAttribute()
    {
        return $this->description['ar'] ?? '';
    }
}
