<?php

namespace App\Models;

use App\Models\Profil;
use App\Models\Contrat;
use App\Models\Service;
use App\Models\Entreprise;
use App\Models\Nationalite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getMatricule($id){
        return 'Matri'.'-'.sprintf("%05d", $id).'-'.date('Y', time());
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function nationalite()
    {
        return $this->belongsTo(Nationalite::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function retenues()
    {
        return $this->belongsToMany(Retenue::class);
    }

    public function enfants()
    {
        return $this->hasMany(Enfant::class);
    }

    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }
}
