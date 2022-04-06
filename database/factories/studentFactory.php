<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'father_name' => $this->faker->name,
            'class_studying' =>$this->faker->randomDigit(5),
            'school_name' => $this->faker->Company,
            'phone' => $this->faker->text
        ];       
    }
}
