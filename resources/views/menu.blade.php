@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Menu
@endsection

<section class="container py-4">
    <h2 class="text-center mt-5 mb-5">Menu</h2>
    <div class="col-lg-12 mx-auto text-center px-0">
        <p class="mb-3">Produção artesanal, vegano, sem lactose e sem glúten.</p>
        <hr>
    </div>

@foreach ($categorias as $categoria)

    <div class="col-lg-12 mx-auto mb-3">
        <div class="container row row-cols-1 row-cols-md-3 mx-auto">
            @foreach ($produtos as $produto)

            @if ($produto->categoria_id == $categoria->id)
    
            <div class="card-group col mb-4 p-0 menu-produtos">
                <div class="card-menu mx-3">
                    <img class="card-img-top h-auto" src="{{ $produto->imagem != null ? asset($produto->imagem) : asset('img/def.png') }}">
                        <div class="card-body text-center p-0 mt-3">
                            <h3 class="text-truncate mb-1 sliding-u-l-r-l" title="{{ $produto->nome }}">{{ $produto->nome }}</h3>
                            <h4>R${{ $produto->preco }}/<small>{{ $produto->unidadeMedida }}</small></h4>
                            <p>{{ $produto->descricao }}</p>
                            <span class="col-12 text-center">
                                <form action="{{ route('cesta-compras.adicionar') }}" method="POST" id="formComprar">
                                    @csrf
                                    <input type="hidden" name="id" value={{ $produto->id }}>
                                        <a href="/cesta-compras">
                                            <button type="submit" class="btn hvr-icon-basket mb-4">Add a Cesta <i class="fa fa-shopping-basket hvr-icon"></i></button>
                                        </a>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>      
        </section>
        @endforeach
        
@endsection