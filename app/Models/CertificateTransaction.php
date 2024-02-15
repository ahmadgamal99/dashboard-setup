<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
