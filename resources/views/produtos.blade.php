@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Menu
@endsection

    <div id="carouselPao" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselPao" data-slide-to="0" class="active"></li>
            <li data-target="#carouselPao" data-slide-to="1"></li>
            <li data-target="#carouselPao" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/produtos/slide1.png') }}" alt="Pão rústico" class='tales'>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 1</h5>
                    <p>Subtítulo 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/produtos/slide2.png') }}" alt="Mesa de Pães" class='tales'>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 2</h5>
                    <p>Subtítulo 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/produtos/slide3.png') }}" alt="Massa de Pão" class='tales'>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 3</h5>
                    <p>Subtítulo 3</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselPao" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselPao" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <section>
        <div class="row mx-4 my-5">
            <div class="col-lg-4 mx-auto text-center px-0">
                <h2>Menu</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.</p>
                <hr>
                <p> Pagamento Online </p>
                <span class="badge badge-secondary">Cartão de Débito</span>
                <span class="badge badge-secondary">Cartão de Crédito </span>
                <hr>
                <p> Pagamento na Entrega </p>
                <hr>
                <span class="badge badge-secondary">Sem Lactose </span>
                <i style='font-size:24px' class='fas'>&#xf7ef;</i>
                <br>
                <span class="badge badge-secondary">Vegetariano </span>
                <i style='font-size:24px' class='fas'>&#xf06c;</i>
            </div>
        </div>
        <div class="col-lg-10 mx-auto text-center">

            <hr>
            <h2>O que você gostaria de levar hoje?</h2>
            <nav class="navbar navbar-light justify-content-center" style="box-shadow: none; z-index:2">
                @foreach ($categorias as $categoria) 
                    <a href="#categoria_{{$categoria->categoria}}" class="nav-link btn btn-primary mx-1 mb-3 col-12 col-md-2"><small>{{$categoria->categoria}}</small></a>
                @endforeach
            </nav>

        </div>
    </section>

    @foreach ($categorias as $categoria)
        
        <section id="categoria_{{$categoria->categoria}}" class="mt-4">
            <div class="col-lg-10 mx-auto text-left mb-3">
                <hr>
                <h2 class="mb-4 px-md-3">{{$categoria->categoria}}</h2>
                <div class="row row-cols-1 row-cols-md-3 m-0">

                    @foreach ($produtos as $produto)
                        
                    @if ($produto->categoria_id == $categoria->id)
                        
                        <div class="card-deck col mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $produto->imagem != null ? asset($produto->imagem) : asset('img/def.png') }}">
                                <div class="card-body">
                                    <span class="float-right">R${{ $produto->preco }}/<small>{{ $produto->unidadeMedida }}</small></span>
                                    <h5 class="text-truncate" title="{{ $produto->nome }}">{{ $produto->nome }}</h5>
                                    <p>{{ $produto->descricao }}</p>           
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="inputGroup-sizing-default" for="quantidade{{ $produto->id }}"><small>Qtd</small></label>
                                        </div>
                                        <input type="text" name="quantidade{{ $produto->id }}" id="quantidade{{ $produto->id }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Quanto vai querer? Ex.: 200g">
                                    </div>
                                    <span class="float-right">
                                        <form action="{{ route('cesta-compras.adicionar') }}" method="POST" id="formComprar">
                                            @csrf
                                            <input type="hidden" name="id" value={{ $produto->id }}>
                                            <button type="submit" class="btn btn-primary float-right">Add a Cesta</button>
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