<?php

use Illuminate\Database\Seeder;

class CategoiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Deleta os registros da tabela CATEGORIAS antes de popular
        DB::table('categorias')->delete();  

        // Criação de Categorias usando o Facade DB
        DB::table('categorias')->insert(['nome' => 'Roupas']);
        DB::table('categorias')->insert(['nome' => 'Eletrônicos']);
        DB::table('categorias')->insert(['nome' => 'Informática']);
        DB::table('categorias')->insert(['nome' => 'Perfumes']);
        DB::table('categorias')->insert(['nome' => 'Móveis']);
        DB::table('categorias')->insert(['nome' => 'Alimentos']);
    }
}
