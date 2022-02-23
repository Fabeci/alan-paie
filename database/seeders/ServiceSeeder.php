<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Config::get('service');

        foreach($services as $q){
            \App\Models\Service::factory()->count(1)->create(["libelle" => $q["libelle"], "employe_id"=> $q["employe_id"]]);
        }
    }
}
