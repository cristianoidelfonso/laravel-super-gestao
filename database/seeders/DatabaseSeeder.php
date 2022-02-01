<?php

namespace Database\Seeders;

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
        // Chamada de Seeders
        // $this->call(FornecedorSeeder::class);
        // $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);


        // Chamada de Factories
        // \App\Models\User::factory(10)->create();
        \App\Models\Fornecedor::factory(100)->create();
        \App\Models\SiteContato::factory(100)->create();

    }
}
