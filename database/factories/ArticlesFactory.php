<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Articles;

class ArticlesFactory extends Factory
{

    protected $model = Articles::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'quantity' => rand(1,10),
            'price' => rand(100,500),
            'user_id' => 1,
        ];
    }
}
