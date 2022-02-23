<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MiseAPied extends Model
{
    use HasFactory;

    public function NumberDays($date_deb, $date_f){
        $date_debut = new Carbon($date_deb);
        $date_fin = new Carbon($date_f);

        $date_debut = $date_debut->format('d-m-Y');
        $date_fin = $date_fin->format('d-m-Y');
        
        list($dd,$md,$yd) = explode('-',$date_debut); 
        list($df,$mf,$yf) = explode('-',$date_fin); 
        
        $timstamp_debut = mktime(0,0,0,$md,$dd,$yd); 
        $timstamp_fin = mktime(0,0,0,$mf,$df,$yf); 
        
        $jours = 0;
        // 86400 -> nombre de seconde par jour 
        for($i = $timstamp_debut; $i <= $timstamp_fin; $i+= 86400){ 
            $jours++;
        } 
        return $jours;
    }
    
    public function discipline()
    {
        return $this->morphOne(Discipline::class, 'disciplinable');
    }
}
