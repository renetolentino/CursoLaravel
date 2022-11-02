<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
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
}
