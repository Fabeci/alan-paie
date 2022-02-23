<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TypeCongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeConges = Config::get('typeConge');

        foreach($typeConges as $q){
            \App\Models\typeConge::factory()->count(1)->create(['libelle' => $q]);
        }
    }
}
