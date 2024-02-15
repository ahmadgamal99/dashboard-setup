<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['roles'];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    protected static function booted()
    {
        static::addGlobalScope(function($query){
            $query->where('email','!=','support@xample.com');
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->where('id','!=',2)->withTimestamps();
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function certificates()
    {
        return $this->belongsToMany(Certificate::class,'certificate_transactions')->withPivot(['awarded_date','expiry_date','notify_on','cost']);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function approvedFinances()
    {
        return $this->hasMany(Finance::class, 'approved_by');
    }

    public function requestedPettyCashes()
    {
        return $this->hasMany(PettyCash::class,'requestor_id');
    }

    public function beneficiaryPettyCashes()
    {
        return $this->hasMany(PettyCash::class,'beneficiary_id');
    }

    public function approvedPettyCashes()
    {
        return $this->hasMany(PettyCash::class,'approved_by');
    }

    public function financePettyCashes()
    {
        return $this->hasMany(PettyCash::class,'finance_user_id');
    }

    public function responsibleEngineerOrders()
    {
        return $this->hasMany(InstallationOrder::class,'responsible_engineer_id');
    }

    public function safetyEngineerOrders()
    {
        return $this->hasMany(InstallationOrder::class,'safety_engineer_id');
    }

    public function fleetManagerOrders()
    {
        return $this->hasMany(InstallationOrder::class,'fleet_manager_id');
    }

}
