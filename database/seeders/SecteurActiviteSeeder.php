<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class SecteurActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\SecteurActivite::factory()->count(30)->create();

        $secteursActivite = Config::get('secteursActivite');

        foreach($secteursActivite as $q){
            \App\Models\SecteurActivite::factory()->count(1)->create(["libelle" => $q]);
        }
    }
}
