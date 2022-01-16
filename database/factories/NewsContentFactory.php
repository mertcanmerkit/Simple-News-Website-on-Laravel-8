<?php

namespace Database\Factories;

use App\Models\NewsContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['publish','passive','draft'];
        return [
            'img_src' => '640x360.png',
            'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'description' => $this->faker->paragraph(20, true),
            'status' => $status[rand(0,2)],
            'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),

        ];

    }
}
