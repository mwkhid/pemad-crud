<?php

namespace App\Models\Admin;

use App\Models\Languages;
use App\Models\Offers;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demands extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function offers()
    {
        return $this->belongsTo(Offers::class, 'offers_id', 'id');
    }

    public function jobs()
    {
        return $this->belongsTo(Jobs::class, 'jobs_id', 'id');
    }

    public function orders()
    {
        return $this->hasOne(Orders::class, 'demands_id', 'id');
    }

    public function languages()
    {
        return $this->belongsTo(Languages::class, 'lang_id', 'id');
    }
}
