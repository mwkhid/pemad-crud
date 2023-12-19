<?php

namespace App\Models;

use App\Models\Bills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bills_id', 'id');
    }
}
