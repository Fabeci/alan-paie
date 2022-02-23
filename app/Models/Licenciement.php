<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenciement extends Model
{
    use HasFactory;

    public function licenciable()
    {
        return $this->morphTo();
    }

    public function motifs()
    {
        return $this->belongsToMany(Motif::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
