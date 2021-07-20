<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = Config::get('classification');

        foreach($classifications as $q){
            \App\Models\Classification::factory()->count(1)->create(["libelle" => $q['libelle'], "type_classification_id" => $q['type_classification_id']]);
        }
    }
}
