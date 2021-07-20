<?php

namespace Database\Factories;

use App\Models\Classification;
use App\Models\TypeClassification;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Classification::class;

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
            'type_classification_id' => TypeClassification::all()->random()->id,
        ];
    }
}
