<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function disciplinable()
    {
        return $this->morphTo();
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}
