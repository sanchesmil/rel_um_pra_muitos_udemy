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
        // Chamar as seeds externas

        $this->call([
            CategoiraSeeder::class,
            ProdutoSeeder::class
        ]);
    }
}
