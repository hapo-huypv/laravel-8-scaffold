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
        $arrayTitle = array("Lorem ipsum dolor sit amet, consectetur adipiscing elit.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at porttitor vehicula. Nullam augue augue.");
        $randIndex = array_rand($arrayTitle);
        return [
            'course_id' => $this->faker->randomDigit(),
            'title' => $arrayTitle[$randIndex],
            'learn_time' => $this->faker->randomDigit(),
            'description' => $this->faker->Text(),
            'video' => $this->faker->Text(),
            'requirement' => $this->faker->Text(),
            'price' => $this->faker->randomDigit(),
            'image' => $this->faker->imageUrl(400, 400, 'technics', true, 'Hapo'),
        ];
    }
}
