<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationOrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function trackers() // to be used in tracked tables
    {
        return $this->morphMany(StatusTracker::class, 'trackable');
    }
    
    public function installationOrder()
    {
        return $this->belongsTo(InstallationOrder::class);
    }

    public function distance()
    {
        return $this->belongsTo(Distance::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}
