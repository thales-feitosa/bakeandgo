<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Produtos;
use App\Pedidos;
use App\CestaCompras;

class PedidosController extends Controller
{

    protected $table = 'pedidos';

    protected $fillable = ['pedido_id', 'produtos_id', 'status'];
    
    public function products(){
        return $this->belongsToMany('App\Produtos');
    }

    // public function showHistorico(){
    //     $pedidos = Pedidos::where([
    //         'status'=>'PA',
    //         'user_id'=> Auth::id()
    //     ])->orderBy('updated_at', 'desc')->get();

    //     return view('admin.admin-historico-pedidos', compact('pedidos'));
    // }

    // LISTANDO PEDIDOS
    public function listAllOrders() {

        if(Auth::check()===true){
            if(Auth::user()->admin==1) {
                $pedidos = DB::table('pedidos');
                $pedidos = $pedidos->paginate(10);
                return view('admin.adm-historico-pedidos')->with('pedidos', $pedidos);
            }
        }
        return redirect()->route('admin.login');
    }
}


