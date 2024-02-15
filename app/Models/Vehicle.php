<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [ 'teams' ];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function maintenances()
    {
        return $this->hasMany(VehicleMaintenance::class);
    }

    public function pickupOrders()
    {
        return $this->hasMany(PickupOrder::class);
    }
}
