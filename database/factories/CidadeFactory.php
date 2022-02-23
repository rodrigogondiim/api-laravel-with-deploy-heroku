<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estado;

class CidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "nome"=> $this->faker->name,
            "estado_id"=> Estado::create(["nome"=>$this->faker->unique()->name])->first()->id,

        ];
    }
}
