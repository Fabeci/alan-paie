<?php

namespace Database\Factories;

use App\Models\Classification;
use App\Models\Contrat;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\TypeContrat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Contrat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->name(),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'cessation' => $this->faker->date(),
            'salaire_base' => $this->faker->name(),
            'fichier' => $this->faker->name(),
            'type_contrat_id' => TypeContrat::all()->random()->id,
            'classification_id' => Classification::all()->random()->id,
            'poste_id' => Poste::all()->random()->id,
            'employe_id' => Employe::all()->random()->id,
        ];
    }
}
