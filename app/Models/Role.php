<?php

namespace App\Models;

use App\Http\Scopes\WithoutDefaultRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;


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
        'certificates',
        'certificates_categories',
        'certificates_transactions',
        'contractors',
        'distances',
        'finances',
        'finances_types',
        'installation_orders',
        'installation_orders_items',
        'installation_orders_tasks',
        'jobs',
        'locations',
        'locations_types',
        'materials',
        'materials_groups',
        'materials_prices',
        'petty_cashes',
        'petty_cashes_types',
        'pickup_orders',
        'status_trackers',
        'teams',
        'vehicles',
        'vehicles_maintenance',
        'settings',
        'recycle_bin',
        'reports',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new WithoutDefaultRole());
    }

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
