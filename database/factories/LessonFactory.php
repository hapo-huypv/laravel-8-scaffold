<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomDigit(),
            'title' => $this->faker->title(),
            'learn_time' => $this->faker->randomDigit(),
            'description' => $this->faker->Text(),
            'video' => $this->faker->Text(),
            'requirement' => $this->faker->Text(),
        ];
    }
}
