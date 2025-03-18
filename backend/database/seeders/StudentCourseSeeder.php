<?php

namespace Database\Seeders;

use App\Models\StudentCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentCourse::factory()->count(30)->create();
    }
}
