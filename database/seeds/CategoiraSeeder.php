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
        DB::table('categorias')->insert(['nome' => 'Roupas']);        // id = 1
        DB::table('categorias')->insert(['nome' => 'Eletrônicos']);   // id = 2
        DB::table('categorias')->insert(['nome' => 'Informática']);   // id = 3
        DB::table('categorias')->insert(['nome' => 'Perfumes']);      // id = 4
        DB::table('categorias')->insert(['nome' => 'Móveis']);        // id = 5
        DB::table('categorias')->insert(['nome' => 'Alimentos']);     // id = 6
    }
}
