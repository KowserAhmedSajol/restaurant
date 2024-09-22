<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResTax;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResTaxFactory extends Factory
{
    protected $model = ResTax::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}