<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResBilling;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResBillingFactory extends Factory
{
    protected $model = ResBilling::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}