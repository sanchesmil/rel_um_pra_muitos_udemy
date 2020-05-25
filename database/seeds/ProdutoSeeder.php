<?php

use App\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Deleta os registros da tabela produtos antes de popular
        DB::table('produtos')->delete();  

        // Criação de Produtos usando o Facade DB

        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Polo', 
            'preco' => 43.4 , 
            'estoque' => 10, 
            'categoria_id' => 1]  // Categoria = Roupas
        );
        DB::table('produtos')->insert(
            ['nome' => 'Calça Jeans', 
            'preco' => 99.9 , 
            'estoque' => 20, 
            'categoria_id' => 1]  // Categoria = Roupas
        );
        DB::table('produtos')->insert(
            ['nome' => 'Microondas Eletrolux', 
            'preco' => 495.50 , 
            'estoque' => 155, 
            'categoria_id' => 2]  // Categoria = Eletrônicos
        );
        DB::table('produtos')->insert(
            ['nome' => 'Notebook Apple', 
            'preco' => 5698.69 , 
            'estoque' => 25, 
            'categoria_id' => 3] // Categoria = Roupas
        );
        DB::table('produtos')->insert(
            ['nome' => 'One Million', 
            'preco' => 152.6 , 
            'estoque' => 200, 
            'categoria_id' => 4] // Categoria = Perfumes
        );
        DB::table('produtos')->insert(
            ['nome' => 'Escrivaninha de cabeceira', 
            'preco' => 365.69, 
            'estoque' => 5, 
            'categoria_id' => 5] // Categoria = Móveis
        );
        DB::table('produtos')->insert(
            ['nome' => 'Chocotone Balduco', 
            'preco' => 20.69, 
            'estoque' => 1000, 
            'categoria_id' => 6] // Categoria = Alimentos
        );

        // ou usando a Classe

        Produto::create([
            'nome' => 'Arroz', 
            'preco' => 4.40, 
            'estoque' => 233, 
            'categoria_id' => 6 // Categoria = Alimentos
        ]);

    }
}
