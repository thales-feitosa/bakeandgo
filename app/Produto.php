<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = "produtos";
    protected $fillable = ['ref', 'nome', 'descricao', 'preco', 'unidadeMedida', 'imagem', 'categoria_id', 'ativo'];

    public function setNomeAttribute($value){
        $this->attributes['nome'] = $value;
        // $this->attributes['slug'] = Str::slug($value);

    }

    public function pedido_produtos(){
        return $this->hasMany('App\PedidoProduto')
        ->select(DB::raw('produto_id, sum(desconto) as descontos, sum(preco) as precos, count(1) as qtd'))
        ->groupBy('produto_id')
        ->orderBy('qtd','desc');
    }

    public function cat(){
        return $this->hasOne('App\Categoria','id','categoria');
    }
    
}