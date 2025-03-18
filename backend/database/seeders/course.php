<?php

namespace Database\Seeders;

use App\Models\Course as ModelsCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class course extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsCourse::factory()->count(10)->create();
    }
}
