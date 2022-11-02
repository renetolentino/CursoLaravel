<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criar a coluna que receberá a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){
            
            //criar um fornecedor padrão para evitar erros na aplicação
            //esse valor poderá ser sobreposto
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor 1000',
                'site' => 'fornecedor1000.com.br',
                'UF' => 'SP',
                'email' => 'contato@fornecedor1000.com.br',
            ]);

            //criar a coluna logo após a coluna id
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar a coluna que receberá a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){
            
            //remover a constraint do tipo FK
            $table->dropForeign('produtos_fornecedor_id_foreign');
            //remover a coluna logo após a coluna id
            $table->dropColumn('fornecedor_id');
        });
    }
};
