<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function trackers() // to be used in tracked tables
    {
        return $this->morphMany(StatusTracker::class, 'trackable');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function deliveryLocation()
    {
        return $this->belongsTo(Location::class, 'delivery_location_id');
    }

    public function pickupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

}
