<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'name' => 'array'
        ];
    }

    function roles()
    {
        return $this->belongsToMany(Role::class);
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
