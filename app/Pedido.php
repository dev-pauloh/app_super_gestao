<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }

    public function produtos() {
        return $this->belongsToMany('App\Produto', 'pedidos_produtos')->withPivot('created_at');

        //Para modelos com noneação nde tabela não padronizada:
        /* 
            return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id');
            1 - Modelo do relacionamento NxN em relação o Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapelada pelo model utilizado no relacionamento que estamos implementando
        */
    }
}
