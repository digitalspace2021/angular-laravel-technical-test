<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Student>
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
            "name" => $this->faker->name(),
            "schedules" => json_encode([
                "monday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "tuesday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "wednesday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "thursday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "friday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "saturday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ],
                "sunday" => [
                    "start" => "08:00",
                    "end" => "12:00"
                ]
            ]),
            "date_start" => $this->faker->date(),
            "date_end" => $this->faker->date(),
            "type" => $this->faker->randomElement(['presential', 'virtual']),
        ];
    }
}
