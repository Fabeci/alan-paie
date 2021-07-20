<?php

namespace Database\Factories;

use App\Models\FormeJuridique;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormeJuridiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\FormeJuridique::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->name(),
            'description' => $this->faker->text(100),
        ];
    }
}
