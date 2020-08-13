@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Quem Somos
@endsection

<section class="jumbotron quem-somos-banner">
    <h2>Quem somos</h2>
</section>
<section class="container">
    <div class="quem-somos">
        <div class="row mx-auto" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-lg-6 w-100 my-auto text-center text-lg-left">
                <h2 class="mb-4">Desde 2020 fazendo os melhores pães.</h2>
                <p class="mb-5">Receitas tradicionais que levam os melhores ingredientes veganos até você. Do brunch ao café da tarde.</p>
                <a href="/menu" class="btn btn-primary quem-somos-btn mb-5">CONHEÇA NOSSOS PRODUTOS</a>
            </div>
            <div class="col-lg-5 col-md mx-auto order-lg-first">
                <img class="img-fluid mb-5" src="{{ asset('img/10_bakeandgo.jpg')}}" alt="Conheça e compre agora nossos produtos.">
            </div>
        </div>
    </div>
</section>

@endsection