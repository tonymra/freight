<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bl_release_date' => fake()->dateTime(),
            'bl_release_user_id' => fake()->numberBetween(1, 10),
            'freight_payer_self' => fake()->boolean(),
            'contract_number' => 'CN-' . fake()->unique()->randomNumber(4),
            'bl_number' => 'BL-' . fake()->unique()->randomNumber(7),
        ];
    }
}
