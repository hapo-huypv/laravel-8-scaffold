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

    // public function configure()
    // {
    //     return $this->afterMaking(function (User $user) {
    //         //
    //     })->afterCreating(function (User $user) {
    //         //
    //     });
    // }

    // $factory->define(App\Models\Course::class, function (Faker $faker)
    // {
    //     return [
    //         'title' => $this->faker->title(),
    //         'logo_path' => './assets/img/ellipse_html.png',
    //         'description' => $this->faker->description(),
    //         'intro' => $this->faker->intro(),
    //         'learn_time' => $this->faker->learn_time(),
    //         'quizzes' => $this->faker->quizzes(),
    //         'price' => $this->faker->price(),
    //     ];
    // });
}
