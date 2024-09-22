<?php

namespace restaurant\restaurant\database\factories;

use restaurant\restaurant\Models\ResOrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResOrderItemFactory extends Factory
{
    protected $model = ResOrderItem::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}