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
        //cria a tabela clientes
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });

        //cria a tabela pedidos
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            //adiciona a chave estrangeira cliente_id 
            //que recebe a chave primária id da tabela clientes
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });

        //cria a tabela pedidos_produtos
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            //cria a chave estrangeira que recebe a chave primária id da tabela pedidos
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            //cria a chave estrangeira que recebe a chave primária id da tabela produtos
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover as chaves estrangeiras
        Schema::table('pedidos_produtos', function (Blueprint $table) {
            //remove a chave estrangeira que recebe a chave primária id da tabela pedidos
            $table->dropForeign('pedidos_produtos_pedido_id_foreign');
            //remove a chave estrangeira que recebe a chave primária id da tabela produtos
            $table->dropForeign('pedidos_produtos_produto_id_foreign');
        });

        //remove a tabela pedidos_produtos
        Schema::dropIfExists('pedidos_produtos');

        //remove a fk de pedidos
        Schema::table('pedidos', function (Blueprint $table) {
            //remove a chave estrangeira cliente_id que recebe id de pedidos
            $table->dropForeign('pedidos_cliente_id_foreign');
        });

        //remover a tabela pedidos
        Schema::dropIfExists('pedidos');

        //remover a tabela clientes
        Schema::dropIfExists('clientes');

        /**
         * Alternativa
         * Schema::disableForeignKeyConstraints();
         * Schema::dropIfExists('pedidos_produtos');
         * Schema::dropIfExists('pedidos');
         * Schema::dropIfExists('clientes');
         * Schema::enableForeignKeyConstraints();
         */
        
    }
};
