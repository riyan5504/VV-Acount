<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QcCost extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function production()
    {
        return $this->belongsTo(Production::class, 'pro_id', 'id');
    }
}
