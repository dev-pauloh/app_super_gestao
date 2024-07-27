<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'pedidos_produtos';
    protected $fillable = ['pedido_id', 'produto_id', 'quantidade'];
}
