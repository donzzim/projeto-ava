<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nome' => 'Eletrônicos',
            'descricao' => 'Dispositivos eletrônicos e gadgets.',
        ]);
        
        Categoria::create([
            'nome' => 'Moda e Vestuário',
            'descricao' => 'Roupas, calçados e acessórios para todas as idades.',
        ]);

        Categoria::create([
            'nome' => 'Livros e Mídia',
            'descricao' => 'Livros físicos e digitais, filmes, música e jogos.',
        ]);

        Categoria::create([
            'nome' => 'Casa e Decoração',
            'descricao' => 'Móveis, utensílios de cozinha, itens de decoração e jardim.',
        ]);

        Categoria::create([
            'nome' => 'Esportes e Lazer',
            'descricao' => 'Equipamentos esportivos, suplementos e itens para atividades ao ar livre.',
        ]);

        Categoria::create([
            'nome' => 'Beleza e Cuidados Pessoais',
            'descricao' => 'Produtos para cabelo, maquiagem, perfumes e higiene pessoal.',
        ]);
    }
}
