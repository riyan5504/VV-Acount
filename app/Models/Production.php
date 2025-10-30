<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'date' => 'date', // বা 'datetime' যদি time থাকে
    ];

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
    public function qcCost()
    {
        return $this->hasMany(QcCost::class, 'pro_id', 'id');
    }

    public function overheadCost()
    {
        return $this->hasMany(OverheadCost::class, 'pro_id', 'id');
    }

    public function transportCost()
    {
        return $this->hasMany(TransportCost::class, 'pro_id', 'id');
    }

    public function productionGt()
    {
        return $this->hasOne(ProductionGt::class, 'pro_id', 'id');
    }

    public function productionGp()
    {
        return $this->hasOne(ProductionGp::class, 'pro_id', 'id');
    }
    public function depreciation()
    {
        return $this->hasMany(Depreciation::class, 'pro_id', 'id');
    }
}
