<?php

namespace Database\Factories;

use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomDigit(),
            'tag_id' => $this->faker->randomDigit(),
        ];
    }
}
