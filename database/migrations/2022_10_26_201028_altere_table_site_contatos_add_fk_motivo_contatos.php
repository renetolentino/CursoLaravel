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
        //o trecho abaixo adiciona a coluna motivo_contatos_id a tabela site_contatos
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //O método abaixo está pegando todos os valores da coluna motivo_contato
        //e atribuindo a nova coluna motivo_contatos_id

        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando a fk
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')
                ->references('id')
                ->on('motivo_contatos');
        });

        //removendo a coluna motivo_contato da tabela site_contatos
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionar a coluna motivo_contato da tabela site_contatos
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
        });

        //O método abaixo está pegando todos os valores da coluna motivo_contatos_id
        //e atribuindo a nova coluna motivo_contato

        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //removendo a fk
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //o trecho abaixo remove a coluna motivo_contatos_id a tabela site_contatos
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });


    }
};
