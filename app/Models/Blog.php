<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'description' => 'array',
        ];
    }

    function getTransTitleAttribute()
    {
        return $this->title[app()->getLocale()] ?? '';
    }

    function getTitleEnAttribute()
    {
        return $this->title['en'] ?? '';
    }

    function getTitleArAttribute()
    {
        return $this->title['ar'] ?? '';
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
