<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class NationaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationalites = Config::get('nationalite');

        foreach($nationalites as $q){
            \App\Models\Nationalite::factory()->count(1)->create(["code" => $q['code'], "libelle" => $q['libelle']]);
        }
    }
}
