<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function trackers() // to be used in tracked tables
    {
        return $this->morphMany(StatusTracker::class, 'trackable');
    }
    
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function items()
    {
        return $this->hasMany(InstallationOrderItem::class);
    }

    public function tasks()
    {
        return $this->hasMany(InstallationOrderTask::class);
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function responsibleEngineer()
    {
        return $this->belongsTo(Admin::class, 'responsible_engineer_id');
    }

    public function safetyEngineer()
    {
        return $this->belongsTo(Admin::class, 'safety_engineer_id');
    }

    public function fleetManager()
    {
        return $this->belongsTo(Admin::class, 'fleet_manager_id');
    }

}