<?php

namespace Database\Factories;

use App\Models\Vecino;
use Illuminate\Database\Eloquent\Factories\Factory;

class VecinoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vecino::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->firstName(),
            'apellidos'=>$this->faker->lastName()." ".$this->faker->lastName(),
            'email'=>$this->faker->unique()->email
        ];
    }
}
