<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Avantage;
use App\Models\Type_contrat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function typeContrat()
    {
        return $this->belongsTo(Type_contrat::class);
    }

    public function avantages()
    {
        return $this->belongsToMany(Avantage::class)->withPivot('taux', 'valeur');
    }

    public function employe()
    {
        return $this->belongsToMany(Employe::class);
    }

}
