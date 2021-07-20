<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class AvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $avantages = Config::get('avantage');

        foreach($avantages as $q){
            \App\Models\Avantage::factory()->count(1)->create(["libelle" => $q['libelle'], "type_avantage_id" => $q['type_avantage_id']]);
        }
    }
}
