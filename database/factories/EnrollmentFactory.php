<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentIds = Student::pluck('id');
        $courseIds = Course::pluck('id');

        return [
            'student_id' => $this->faker->randomElement($studentIds),
            'course_id' => $this->faker->randomElement($courseIds),
        ];
    }
}
