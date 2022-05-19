<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function customCategory($name)
    {
        return $this->state(function (array $attributes) use($name) {
            return [
                'name' => $name,
            ];
        });
    }
}
