<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class T_restaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_food' => $this->faker->name(),
            'image' => $this->faker->name(),
            'price' => rand(1,999)."000000",
            'description' => $this->faker->name(),
            'id_category' => rand(1,3),
        ];
    }
}
