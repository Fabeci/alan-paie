<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avantage extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function contrats()
    {
        return $this->belongsToMany(Contrat::class);
    }

    public function typeAvantage()
    {
        return $this->belongsTo(TypeAvantage::class);
    }
}
