<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeExplication extends Model
{
    use HasFactory;

    public function disciplines()
    {
        return $this->morphMany(Discipline::class, 'disciplinable');
    }
}
