<?php

namespace App\Models\Admin;

use App\Models\Offers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function types()
    {
        return $this->belongsTo(Types::class, 'types_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offers::class, 'job_id', 'id');
    }

    public function demands()
    {
        return $this->hasMany(Demands::class, 'jobs_id', 'id');
    }
}
