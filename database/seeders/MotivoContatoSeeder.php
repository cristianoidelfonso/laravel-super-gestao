<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MotivoContato::create(['motivo_contato'=>'Dúvida']);
        \App\Models\MotivoContato::create(['motivo_contato'=>'Elogio']);
        \App\Models\MotivoContato::create(['motivo_contato'=>'Reclamação']);
    }
}
