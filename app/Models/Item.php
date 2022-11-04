<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];
    protected $table = 'produtos';

    public function produtoDetalhe() {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor() {
        /**Acessa a tabela fornecedores
         * @params \App\Models\Fornecedor
         * @params coluna da pk
         * @params coluna da fk
         * @return \App\Modells\Item
         */
        //return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
        /**
         * 1 - Modelo da tabela que contém as chaves desta tabela
         * 2 - tabela auxiliar que armazena as relações das 2 tabelas relacionadas
         * 3 - FK na tabela auxiliar que recebe a PK desse model
         * 4 - FK na tabela auxiliar q recebe a PK da tabela relacionada
         */
    }
}
