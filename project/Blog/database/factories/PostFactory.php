<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;



class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'text' => $this->faker->text(),
            'author' => 1,
            'created_at' => Carbon::now('Asia/Karachi')->subMonths(1),
            'updated_at' => Carbon::now('Asia/Karachi')->subMonths(1),
        ];
    }
}
