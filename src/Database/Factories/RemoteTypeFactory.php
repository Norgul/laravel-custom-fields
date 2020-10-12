<?php

namespace Voice\CustomFields\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Voice\CustomFields\App\RemoteType;

class RemoteTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RemoteType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plain_type_id' => null,
            'url'           => $this->faker->url,
            'method'        => null,
            'body'          => $this->faker->sentence,
            'created_at'    => Date::now(),
            'updated_at'    => Date::now(),
        ];
    }
}