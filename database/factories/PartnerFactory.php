<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'dni' => $this->faker->randomNumber(8),
            'phone' => $this->faker->phoneNumber(),
            'active' => true,
            'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
            'date_of_birth' => $this->faker->date(),
            'date_of_registration' => $this->faker->date(),
            'address' => $this->faker->address(),
        ];
    }
}
