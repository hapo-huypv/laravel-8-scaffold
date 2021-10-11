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
        $arrayTitle = array( "HTML Fundamentals", "jQuery Tutorial", "Data Science with Python", "Machine Learning", "Angular + NestJS", "Ruby Tutorial", "C Tutorial", "C# Tutorial", "Swift 4 Fundamentals", "PHP Tutorial", "SQL Fundamentals", "CSS Fundamentals" );
        $randIndex = array_rand($arrayTitle);

        $arrayImg = array("assets/img/laravel_1_logo_black_and_white.png", "assets/img/rails_course.png", "assets/img/rectangle_15.png", "assets/img/css_course.png");
        $randImgIndex = array_rand($arrayImg);

        return [
            'title' => $arrayTitle[$randIndex],
            'logo_path' => $this->faker->imageUrl($width = 400, $height = 400, 'technics', true, 'Hapo'),
            'description' => $this->faker->realText(),
            'intro' => $this->faker->realText(),
            'learn_time' => $this->faker->randomDigitNotNull(),
            'quizzes' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'image' => $arrayImg[$randImgIndex],
        ];
    }
}
