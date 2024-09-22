<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResCategoryFactory extends Factory
{
    protected $model = ResCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}