<?php

namespace App\Models;

use App\Models\Admin\Demands;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Languages extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function demands()
    {
        return $this->hasMany(Demands::class, 'lang_id', 'id');
    }
}
