<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instanciando a classe
        $fornecedor = new \App\Models\Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'MG';
        $fornecedor->email = 'fornecedor1@contato.com.br';
        $fornecedor->save();

        // Usando o metodo create('Atenção para o fillable do model')
        \App\Models\Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'fornecedor2.com.br',
            'uf' => 'RJ',
            'email' => 'fornecedor2@contato.com.br',
        ]);

        // Usando o insert diretamente
        \DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'fornecedor3.com.br',
            'uf' => 'SP',
            'email' => 'fornecedor3@contato.com.br',
        ]);
    }
}
