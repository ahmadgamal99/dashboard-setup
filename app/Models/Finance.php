<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function pettyCash()
    {
        return $this->belongsTo(PettyCash::class);
    }

    public function installationOrder()
    {
        return $this->belongsTo(InstallationOrder::class);
    }

    public function type()
    {
        return $this->belongsTo(FinanceType::class);
    }

    public function approvalUser()
    {
        return $this->belongsTo(Admin::class,'approved_by');
    }
}
