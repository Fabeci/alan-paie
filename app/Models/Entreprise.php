<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $guarded = [];

    public function dirigeant(){
        
        return $this->belongsTo(Dirigeant::class);
    }

    public function formeJuridique()
    {
        return $this->belongsTo(FormeJuridique::class);
    }

    public function employes(){
        
        return $this->hasMany(Employe::class);
    }

}
