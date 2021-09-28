<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'logo_path' => './assets/img/ellipse_html.png',
            'description' => $this->faker->realText(),
            'intro' => $this->faker->realText(),
            'learn_time' => $this->faker->randomDigitNotNull(),
            'quizzes' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
