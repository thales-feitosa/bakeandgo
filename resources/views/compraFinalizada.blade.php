@extends('layouts.app')
@section('title')
    Bake & Go | Compra Finalizada
@endsection
@section('content')

<section class="container jumbotron pt-0 mt-3 ajuste d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col-md-12 text-center boxCheck">
            <p class='pedidoFinal m-0'><i class="fas fa-check-circle checkCompra d-block mb-2"></i>Pedido finalizado com sucesso!</p>
            <p class="font-weight-bold">O número do seu pedido é: {{$pedido->id}}</p>
            <p class="m-0">Muito obrigado por comprar na Bake & Go.</p>
            <p class="m-0">Acompanhe aqui seu pedido</p>
        </div>        
    </div>
</section>

@endsection