<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayName = array("Program learn HTML/CSS", "Download course slides", "Download course videos");
        $randIndex = array_rand($arrayName);
        return [
            'lesson_id' => $this->faker->randomDigit(),
            'name' => $arrayName[$randIndex],
            'type' => $randIndex,
            'path' => $this->faker->imageUrl($width = 400, $height = 400, 'technics', true, 'Hapo'),
        ];
    }
}
