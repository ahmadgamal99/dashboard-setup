<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCash extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function trackers()
    {
        return $this->morphMany(StatusTracker::class, 'trackable');
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }

    public function type()
    {
        return $this->belongsTo(PettyCashType::class);
    }

    public function requestor()
    {
        return $this->belongsTo(Admin::class, 'requestor_id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Admin::class, 'beneficiary_id');
    }

    public function approvalUser()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function financialUser()
    {
        return $this->belongsTo(Admin::class, 'finance_user_id');
    }
}