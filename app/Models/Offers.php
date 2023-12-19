<?php

namespace App\Models;

use App\Models\Admin\Demands;
use App\Models\Admin\Jobs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function jobs()
    {
        return $this->belongsTo(Jobs::class, 'job_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function demands()
    {
        return $this->hasMany(Demands::class, 'offers_id', 'id');
    }
}
