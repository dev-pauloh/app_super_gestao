<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes'; //nome da tabela no banco
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item() {
        return $this->belongsTo('App\Item', 'produto_id', 'id');
    }
}
