<?php

namespace Database\Factories;

use App\Models\Nationalite;
use Illuminate\Database\Eloquent\Factories\Factory;

class NationaliteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Nationalite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->name(),
            'libelle' => $this->faker->name(),
            'description' => $this->faker->text(100),
        ];
    }
}
