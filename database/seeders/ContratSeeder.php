<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contrats = Config::get('contrat');

        foreach($contrats as $q){
            \App\Models\Contrat::factory()->count(1)->create([
                "libelle" => $q['libelle'], 
                "date_debut" => $q['date_debut'], 
                "date_fin" => $q['date_fin'], 
                "salaire_base" => $q['salaire_base'], 
                "fichier" => $q['fichier'], 
                "type_contrat_id" => $q['type_contrat_id'], 
                "classification_id" => $q['classification_id'], 
                "poste_id" => $q['poste_id'], 
                "employe_id" => $q['employe_id']
            ]);
        }
    }
}
