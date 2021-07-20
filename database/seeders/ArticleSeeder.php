<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Config::get('article');

        foreach($articles as $q){
            \App\Models\Article::factory()->count(1)->create(["titre" => $q]);
        }
    }
}
