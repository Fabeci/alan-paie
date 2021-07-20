<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TypeAvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeAvantages = Config::get('typeAvantage');

        // var_dump($typeAvantages);

        foreach($typeAvantages as $q){
            \App\Models\TypeAvantage::factory()->count(1)->create(["libelle" => $q]);
        }
    }
}
