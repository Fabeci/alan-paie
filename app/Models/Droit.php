<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    public function profiles()
    {
        return $this->belongsToMany(Profil::class);
    }
}
