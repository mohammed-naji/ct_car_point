<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    function part()
    {
        return $this->belongsTo(Part::class)->withDefault();
    }
}
