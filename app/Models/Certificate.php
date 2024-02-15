<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function admins()
    {
        return $this->belongsToMany(Admin::class,'certificate_transactions')->withPivot(['awarded_date','expiry_date','notify_on','cost']);
    }

    public function category()
    {
        return $this->belongsTo(CertificateCategory::class);
    }
}
