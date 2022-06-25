<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 5),
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraph(3, true)
        ];
    }
}


// $factory->define(App\Post::class, function (Faker\Generator $faker) {

//     return [
//         'user_id' => rand(1, 5),
//         'title' => $faker->name,
//         'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
//     ];
// });