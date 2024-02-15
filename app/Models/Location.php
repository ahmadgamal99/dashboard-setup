<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function installationOrders()
    {
        return $this->hasMany(InstallationOrder::class);
    }
    
    public function pickupOrders()
    {
        return $this->hasMany(PickupOrder::class, 'pickup_location_id');
    }
    
    public function deliveryOrders()
    {
        return $this->hasMany(PickupOrder::class, 'delivery_location_id');
    }

    public function type()
    {
        return $this->belongsTo(LocationType::class);
    }
}
