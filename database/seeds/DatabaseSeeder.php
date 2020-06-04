<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Chamar as seeds externas na ordem correta

        $this->call([
            CategoiraSeeder::class,
            ProdutoSeeder::class
        ]);
    }
}
