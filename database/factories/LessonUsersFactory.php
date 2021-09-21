<?php

namespace Database\Factories;

use App\Models\LessonUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonUsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomDigit(),
            'user_id' => $this->faker->randomDigit(),
        ];
    }
}
