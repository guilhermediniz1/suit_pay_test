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
            'name' => $this->faker->word,
            'is_online' => $this->faker->boolean,
            'enrollment_deadline' => $this->faker->dateTimeBetween('now', '+30 days'),
            'vacancies' => $this->faker->randomNumber(2),
        ];
    }
}
