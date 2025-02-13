<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastName' => fake()->lastName(),
            'firstName' => fake()->firstName(),
            'phoneNumber' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'bankingDetails' => fake()->bankAccountNumber(),
            'created_at' => fake()->date(),
            'updated_at' => fake()->date(),
        ];
    }
}
