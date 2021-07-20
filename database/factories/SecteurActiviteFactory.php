<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SecteurActiviteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\SecteurActivite::class;

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
