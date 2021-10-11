<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Program;
use App\Models\Tag;
use App\Models\CourseTag;
use database\factories\CourseTagsFactory;

class CourseTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()
            ->hasAttached(Course::factory()
                ->has(Lesson::factory()
                    ->has(Program::factory()->count(3)->state(function (array $attributes, Lesson $lesson) {
                        return ['lesson_id' => $lesson->id];
                    }))
                ->count(5)->state(function (array $attributes, Course $course) {
                    return ['course_id' => $course->id];
                }))
                ->count(30))
            ->count(6)->create();
    }
}
