<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SiteContatoFactory::factoryForModel('SiteContato')->count(100)->create();

        //Instânciar o modelo do objeto SiteContato
        /*
        $contato = new SiteContato();

        $contato->nome = 'Gislene';
        $contato->telefone = '(21)99988-8776';
        $contato->email = 'gislene@teste.com.br';
        $contato->motivo_contato = 2;
        $contato->mensagem = 'Está aqui é uma mensagem de teste. Apenas um textículo!';
        $contato->save();
        */


        /**
         * Popular a tabela site_contato do banco de dados
         * de forma estática
         * lembrando que primeiro devemos verificar 
         * se no model SiteContato o atributo fillable está declarado
         */
        /*
        SiteContato::create([
            'nome' => 'Renê',
            'telefone' => '(34)99859-1519',
            'email' => 'rene.tolentino1@hotmail.com',
            'motivo_contato' => 1,
            'mensagem' => 'Olá tudo bem? Isso aqui é uma mensagem de teste.'
        ]);
        */

    }
}
