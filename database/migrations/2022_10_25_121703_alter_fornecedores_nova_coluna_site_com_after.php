<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        //Selecionar a tabela
        Schema::table('fornecedores', function(Blueprint $table) {
            //criar a coluna [site] após a coluna [nome]
            $table->string('site', 150)->after('nome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //selecionar a tabela fornecedores
        Schema::table('fornecedores', function(Blueprint $table) {
            $table->dropColumn('site');
        });
    }
};
