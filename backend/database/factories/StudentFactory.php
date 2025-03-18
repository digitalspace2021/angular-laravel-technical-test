<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "last_name" => $this->faker->lastName(),
            "email" => $this->faker->unique()->safeEmail(),
            "age" => $this->faker->numberBetween(18, 60),
            "identification" => $this->faker->unique()->randomNumber(9),
        ];
    }
}
