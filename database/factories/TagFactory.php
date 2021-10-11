<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayName =  array("html", "css", "learn", "coder", "developer", "js");
        $randIndex = shuffle($arrayName);

        return [
            'name' => '#'.$arrayName[$randIndex],
        ];
    }
}
