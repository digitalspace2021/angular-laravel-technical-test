<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id");
            $table->foreignId('course_id');
            $table->boolean('status')->default(0);

            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
