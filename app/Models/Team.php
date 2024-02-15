<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function installationOrders()
    {
        return $this->hasMany(InstallationOrder::class);
    }

}
