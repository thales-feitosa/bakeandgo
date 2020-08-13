<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Pedido;
use Illuminate\Support\Facades\View;
use App\CestaCompras;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            // $categoriasNav = Categoria::paginate(5);
            // $todasAsCategorias = Categoria::all();
            
            if(Auth::check()===true) {
                $itensCesta = Pedido::where([
                    'status'=>'RE',
                    'user_id'=>Auth::id()
                ])->get();
                !empty($itensCesta[0]->id)?
                $itensCesta = $itensCesta[0]->pedido_produtos->count():
                $itensCesta = 0;
            } else {
                $itensCesta = 0;
                $oldCart = Session::get('cart');
                $cart = new CestaCompras($oldCart);
                $itensCesta = $cart->totalQtd;
            }


            $view->with([
                // 'categoriasNav' => $categoriasNav,
                // 'todasAsCategorias' => $todasAsCategorias,
                'itensCesta'=> $itensCesta
            ]);
        });
    }
}
