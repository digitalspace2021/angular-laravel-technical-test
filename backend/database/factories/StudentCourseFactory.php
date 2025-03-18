<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=StudentCourse>
 */
class StudentCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = Course::all();
        $student = Student::all();
        return [
            "student_id" => $student->random()->id,
            "course_id" => $course->random()->id,
            "status" => $this->faker->randomElement([true, false]),
        ];
    }
}
