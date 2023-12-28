<?php

namespace Database\Factories\Orders;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders\Order>
 */
class OrderFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10000, 150000),
            'deadline' => $this->faker->dateTimeBetween('+7 days', '+3 months'),
        ];
    }
}
