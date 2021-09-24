<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Course;
use App\Models\Lesson;
use database\factories\CourseFactory;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()
            ->has(Lesson::factory()->count(3)->state(function (array $attributes, Course $course) {
                return ['course_id' => $course->id];
            }))
            ->count(3)->create();
    }
}
