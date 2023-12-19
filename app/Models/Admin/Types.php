<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function jobs()
    {
        return $this->hasMany(Jobs::class, 'type_id', 'id');
    }
}