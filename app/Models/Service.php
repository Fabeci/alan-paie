<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    public function postes()
    {
        return $this->hasMany(Poste::class);
    }

    public function employe()
    {
        return $this->hasOne(Employe::class);
    }


}
