<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirigeant extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function entreprise()
    {
        return $this->hasOne(Entreprise::class);
    }
}
