<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\NewsContent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['publish','passive'];
        return [
            'commenter_id' => rand(1,User::count()),
            'news_id' => rand(1,NewsContent::count()),
            'content' => $this->faker->text(50),
            'status' => $status[rand(0,1)]
            ];
    }
}
