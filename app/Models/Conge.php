<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    public function NumberDaysWithoutWeek($date_deb, $date_f){
        $date_debut = new Carbon($date_deb);
        $date_fin = new Carbon($date_f);

        $date_debut = $date_debut->format('d-m-Y');
        $date_fin = $date_fin->format('d-m-Y');
        
        list($dd,$md,$yd) = explode('-',$date_debut); 
        list($df,$mf,$yf) = explode('-',$date_fin); 
        
        $timstamp_debut = mktime(0,0,0,$md,$dd,$yd); 
        $timstamp_fin = mktime(0,0,0,$mf,$df,$yf); 
        
        $conges = 0; 
        $jours = 0; 
        // 86400 -> nombre de seconde par jour 
        for($i = $timstamp_debut; $i <= $timstamp_fin; $i+= 86400){ 
        if(in_array(date('w', $i) , array(1,2,3,4,5))){ 
        $conges++; 
        } 
        $jours++; 
        } 
        return $conges;
    }

    public function users()
    {
        return $this->belongsToMany(user::class)->withPivot('statut', 'heure', 'fichier');
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function employe()
    {
        return $this->belongsTo(employe::class);
    }

    public function type_conge()
    {
        return $this->belongsTo(TypeConge::class);
    }

    
}
