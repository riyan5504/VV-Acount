<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function rawMaterials()
    {
        return $this->hasMany(RawMatreial::class, 'item_id', 'id');
    }

    public function production()
    {
        return $this->hasMany(Production::class, 'item_id', 'id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'item_id', 'id');
    }

    public function purchaseItem()
    {
        return $this->hasMany(PurchaseItem::class, 'item_id', 'id');
    }
}
