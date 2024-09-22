<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResProductFactory extends Factory
{
    protected $model = ResProduct::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}