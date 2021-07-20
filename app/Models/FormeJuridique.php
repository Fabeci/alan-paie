<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormeJuridique extends Model
{
    use HasFactory;

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }
}
