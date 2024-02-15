<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = ['groups'];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function prices()
    {
        return $this->hasMany(MaterialPrice::class);
    }

    public function groups()
    {
        return $this->belongsToMany(MaterialGroup::class);
    }

    public function items()
    {
        return $this->hasMany(InstallationOrderItem::class);
    }
}
