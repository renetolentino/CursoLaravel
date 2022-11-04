<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        //return $this->belongsToMany(Produto::class, 'pedidos_produtos');
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot(['id', 'created_at', 'updated_at', 'quantidade']);
        /**
         * 1 - Modelo da tabela NxN em relação ao modelo que estamos implementando
         * 2 - Tabela auxiliar que armazena os registros de relacionamento
         * 3 - Representa a FK da tabela mapeada pelo modelo na tabela de relacionamento
         * 4 - Representa a FK da tabela mapeada pelo modelo utilizado no relacionamento que estamos implementando
         */
    }
}
