<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'author_name' => fake('uk_UA')->name(),
            'city' => fake('uk_UA')->city(),
            'rating' => rand(4, 5),
            'text' => fake('uk_UA')->realText(180),
            'status' => 'approved',
            'city_id' => City::query()->inRandomOrder()->value('id') ?? null,
            'guide_id' => null,
        ];
    }
}
