<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    protected $guarded = ['abilities'];
    protected $appends = ['name'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public static $modules = [
        'admins',
        'roles',
        'settings',
        'reports'
    ];

    public function getNameAttribute()
    {
        return $this->attributes[ 'name_' . getLocale() ];
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }
}
