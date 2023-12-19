<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function demands()
    {
        return $this->hasMany(Demands::class, 'clients_id', 'id');
    }
}