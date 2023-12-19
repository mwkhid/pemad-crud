<?php

namespace App\Models;

use App\Models\Admin\Projects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bills extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orders_id', 'id');
    }

    public function payments()
    {
        return $this->hasOne(Payments::class, 'bills_id', 'id');
    }

    public function projects()
    {
        return $this->hasOne(Projects::class, 'bills_id', 'id');
    }
}
