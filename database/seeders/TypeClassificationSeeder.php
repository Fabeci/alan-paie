<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TypeClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeClassifications = Config::get('typeClassification');

        foreach($typeClassifications as $q){
            \App\Models\TypeClassification::factory()->count(1)->create(["code" => $q['code'], "libelle" => $q['libelle']]);
        }
    }
}
