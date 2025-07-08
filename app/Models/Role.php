<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'name' => 'array'
        ];
    }

    function permissions()
    {
        return $this->belongsToMany(Permission::class);
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
}
