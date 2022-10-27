<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Adicionar os atributos da tabela site_contatos
            'nome' => fake()->name(),
            'telefone' => fake()->unique()->numerify('(' . fake()->numberBetween(11, 99) . ') ' . '9####-####'),
            'email' => fake()->unique()->safeEmail(),
            'motivo_contato' => fake()->numberBetween(1, 3),
            'mensagem' => fake()->text(200)
        ];
    }
}
