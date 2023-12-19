<?php

namespace App\Models;

use App\Models\Admin\Demands;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function demands()
    {
        return $this->belongsTo(Demands::class, 'demands_id', 'id');
    }

    public function bills()
    {
        return $this->hasOne(Bills::class, 'orders_id', 'id');
    }
}
