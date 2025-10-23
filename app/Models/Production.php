<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rawMaterial()
    {
        return $this->hasMany(RawMatreial::class, 'pro_id', 'id');
    }
    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function laborCost()
    {
        return $this->hasMany(LaborCost::class, 'pro_id', 'id');
    }
    public function packagingMaterial()
    {
        return $this->hasMany(PackagingMaterial::class, 'pro_id', 'id');
    }
    public function utilityCost()
    {
        return $this->hasMany(UtilityCost::class, 'pro_id', 'id');
    }
}
