<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'name' => $this->faker->word,
            'city_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'price' => $this->faker->randomNumber(6)

        ];
    }
}
