<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeContrats = Config::get('typeContrat');

        foreach($typeContrats as $q){
            \App\Models\TypeContrat::factory()->count(1)->create(['code' => $q["code"], 'libelle' => $q["libelle"]]);
        }
    }
}
