<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'is_online' => $this->faker->boolean,
            'enrollment_deadline' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'vacancies' => $this->faker->randomNumber(2),
        ];
    }
}
