<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retenue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employes()
    {
        return $this->belongsToMany(Employe::class);
    }
}
