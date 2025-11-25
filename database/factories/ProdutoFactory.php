<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory


{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'preco' => $this->faker->numerify('#####'),
            'qtd_estoque' => $this->faker->randomFloat(1, 10, 40),
            'categoria' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e']),
            'estoque_minimo' => $this->faker->randomFloat(1, 10, 40),

        ];
    }
}
