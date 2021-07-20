<?php

namespace Database\Factories;

use App\Models\Avantage;
use App\Models\TypeAvantage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvantageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Avantage::class;

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
            'type_avantage_id' => TypeAvantage::all()->random()->id,
        ];
    }
}
