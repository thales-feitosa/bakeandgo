<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Categoria;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PaginaProdutosController extends Controller
{
    public function index() {
        $match = DB::table('categorias')
                    ->join('produtos', 'categorias.id', '=', 'produtos.categoria_id')
                    ->get();

        $categorias = Categoria::all();
        $produtos = Produto::all();
        
        return view('/produtos')->with('produtos', $produtos)->with('categorias', $categorias)->with('match', $match);
        
    }
}
