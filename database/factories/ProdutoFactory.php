<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Categoria;
use App\Models\User;

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
            'nome' => fake()->unique()->sentence(2),
            'descricao' => fake()->paragraph(),
            'preco' => fake()->randomFloat(2, 10, 1000),
            'slug' => fake()->unique()->slug(),
            'imagem' => null,
            'user_id' => User::pluck('id')->random() ?: User::factory(),
            // pluck = pega todos os ids da tabela users (pluck significa "pegar" ou "arrancar")
            'categoria_id' => Categoria::pluck('id')->random() ?: Categoria::factory(),
        ];
    }
}
