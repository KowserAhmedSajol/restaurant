<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResTable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResTableFactory extends Factory
{
    protected $model = ResTable::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}