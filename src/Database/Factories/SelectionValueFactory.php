<?php

namespace Voice\CustomFields\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Voice\CustomFields\App\SelectionValue;

class SelectionValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SelectionValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'selection_type_id' => null,
            'label'             => $this->faker->word,
            'preselect'         => $this->faker->boolean(10),
            'value'             => null,
            'created_at'        => now(),
            'updated_at'        => now(),
        ];
    }
}
