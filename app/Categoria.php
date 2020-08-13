<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';
    protected $fillable = ['categoria'];

    public function setTipoAttribute($value){
        $this->attributes['categoria'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

}
