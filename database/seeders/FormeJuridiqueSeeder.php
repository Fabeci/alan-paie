<?php

namespace Database\Seeders;

use App\Models\FormeJuridique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class FormeJuridiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formeJuridiques = Config::get('formeJuridiques');

        var_dump($formeJuridiques);

        foreach($formeJuridiques as $q){
            FormeJuridique::factory()->count(1)->create(["libelle" => $q]);
        }
    }
}
