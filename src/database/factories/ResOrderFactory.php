<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResOrderFactory extends Factory
{
    protected $model = ResOrder::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}