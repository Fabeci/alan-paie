<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FormeJuridiqueSeeder::class);
        $this->call(SecteurActiviteSeeder::class);
        $this->call(TypeContratSeeder::class);
        $this->call(PaysSeeder::class);
        $this->call(TypeClassificationSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(NationaliteSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(TypeAvantageSeeder::class);
        $this->call(AvantageSeeder::class);
        $this->call(TypeCongeSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PosteSeeder::class);
        // \App\Models\User::factory(10)->create();

        $superadminProfil = Profil::create([
            'code' => 'SUPER-ADMIN',
            'libelle' => 'SUPER ADMINISTRATEUR',
        ]);

        $adminProfil = Profil::create([
            'code' => 'ADMIN',
            'libelle' => 'ADMINISTRATEUR',
        ]);

        $dgProfil = Profil::create([
            'code' => 'DG',
            'libelle' => 'DIRETEUR GENERAL',
        ]);

        $dafProfil = Profil::create([
            'code' => 'AD',
            'libelle' => 'AUTRES DIRIGEANTS',
        ]);


        $EmpProfil = Profil::create([
            'code' => 'EMP',
            'libelle' => 'EMPLOYE',
        ]);


        // $superadmin = User::create([
        //     'name' => 'Djerabe Fabrice',
        //     'email' => 'fabricedjerabe17@gmail.com',
        //     'password' => Hash::make('password'),
        //     "profil_id" => 1
        // ]);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        //     "profil_id" => 2
        // ]);

        // $employe = User::create([
        //     'name' => 'Mbaiwodji Bienvenue',
        //     'email' => 'bienvenue@laravue.dev',
        //     'password' => Hash::make('password'),
        //     "profil_id" => 3
        // ]);
        // $editor = User::create([
        //     'name' => 'Baide Espoir',
        //     'email' => 'espoir@laravue.dev',
        //     'password' => Hash::make('password'),
        //     "profil_id" => 4
        // ]);
    }
}
