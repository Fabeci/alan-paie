<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blame extends Model
{
    use HasFactory;

    public function discipline()
    {
        return $this->morphOne(Discipline::class, 'disciplinable');
    }
}
