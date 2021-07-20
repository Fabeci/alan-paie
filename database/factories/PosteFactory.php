<?php

namespace Database\Factories;

use App\Models\Poste;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Poste::class;

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
            'service_id' => Service::all()->random()->id,
        ];
    }
}
