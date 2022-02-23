<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory; 

    public function typeClassification()
    {
        return $this->belongsTo(TypeClassification::class);
    }
}
