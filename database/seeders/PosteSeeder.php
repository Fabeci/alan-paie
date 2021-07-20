<?php

namespace Database\Seeders;

use App\Models\Poste;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postes = Config::get('poste');

        foreach($postes as $q){
            Poste::factory()->count(1)->create(["libelle" => $q["libelle"], "service_id" => $q["service_id"]]);
        }
    }
}
