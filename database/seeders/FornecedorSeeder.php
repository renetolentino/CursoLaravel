<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciar o modelo de Fornecedor
        $fornecedor = new Fornecedor();

        //Determinar os valores dos atributos do objeto Fornecedor
        $fornecedor->nome = 'Empresa 1';
        $fornecedor->site = 'empresa1.com.br';
        $fornecedor->UF = 'DF';
        $fornecedor->email = 'contato@empresa1.com.br';
        $fornecedor->save();

        //Popular através do método estático
        //Prestar atenção no atributo private $fillable
        //caso ele não esteja definido no modelo da classe instanciada
        //o código acarretará em um erro
        Fornecedor::create([
            'nome' => 'Empresa 2',
            'site' => 'empresa2.com.br',
            'UF' => 'CE',
            'email' => 'contato@empresa2.com.br'
        ]);

        /**
         * Também é possível inserir conteúdo no banco de dados através do objeto DB
         * Este método aceita como parâmetro um array com as colunas => valores a serem
         * inseridas no banco de dados
         * Lembrar de verificar se o model DB se encontra no contexto da aplicação 
         * para evitar erros
         */

         DB::table('fornecedores')->insert([
            'nome' => 'Empresa 3',
            'site' => 'empresa3.com.br',
            'UF' => 'PB',
            'email' => 'contato@empresa3.com.br'
         ]);
         /**
          * Lembrar que o método insert do objeto table do modelo DB não preenche
          * as colunas created_at e updated_at do banco de dados.
          * Para executar este método é necessário chamá-lo no arquivo DatabaseSeeder.php
          */
    }
}
