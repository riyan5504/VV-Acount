<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMatreial extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function production()
    {
        return $this->belongsTo(Production::class, 'pro_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
