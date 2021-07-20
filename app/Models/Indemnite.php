<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indemnite extends Model
{
    use HasFactory;

    public function avantages()
    {
        return $this->morphMany(Avantage::class, 'avantageable');
    }
}
