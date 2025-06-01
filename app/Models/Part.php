<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //

    protected $guarded = [];

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
}
