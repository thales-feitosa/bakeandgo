<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoPedido extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'id',
        'created_at',
        'user_id',
        'produtos_id',
        'user_endereco',
        'status',
    ];

    public function Pedido()
    {
        return $this->belongsTo('App\Pedido');
    }

    public function Produto()
    {
        return $this->belongsTo('App\Produto');
    }
}