<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function droits()
    {
        return $this->belongsToMany(Droit::class);
    }
}
