@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Cesta de Compras
@endsection

<section class="container-fluid py-5 mt-5">
    <div class="topo-pagina" id="topoCarrinho">
        <h2 class="col-12 text-center py-4">Cesta de Compras</h2>
    </div>
    @if(session('mensagem-sucesso'))
    <section class="row">
        <div class="col-md-12">
            <div class="message alert alert-success text-center">
                {{ session('mensagem-sucesso') }}
            </div>
        </div>
    </section>
    @endif
    @if(session('mensagem-falha'))
    <section class="row">
        <div class="col-md-12">
            <div class="message alert alert-danger text-center">
                {{ session('mensagem-falha') }}
            </div>
        </div>
    </section>
    @endif
    <section class="container">
        <div class="row-cesta mr-2 ml-2">
            <form class="col-12 mb-3 link-continuar" id="carrinhoForm" action="/pagamento" method="#">
                <p class="mb-5 text-center">Confira abaixo os produtos selecionados ou <a href="/">continue comprando</a></p>
                @forelse ($pedidos as $pedido)
                    <div class="col-12 text-center">
                        <div id="table" class="tableCarrinho">
                            <table class="table text-center mt-3 tableCarrinho">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col" colspan="2" class="text-left"><h4 class="mb-0">Itens selecionados</h4></th>
                                        <th scope="col">Qtd</th>
                                        <th scope="col">Preço Unitário</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_pedido = 0;
                                    @endphp
                                    @foreach ($pedido->pedido_produtos as $pedido_produto)
                                        
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex align-items-start justify-content-start flex-column flex-lg-row">
                                                <img src="{{$pedido_produto->produto->imagem}}" width="65" height="auto" alt="" class="mr-3">
                                                <div class="text-left">
                                                    <h5 class="my-1"> {{$pedido_produto->produto->nome}}</h5>
                                                    <small class="text-muted my-0">REF {{$pedido_produto->produto->id}}</small><br>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="align-middle">
                                                <a href="#" class="">
                                                    <i class="far fa-minus-circle" onclick="cestaRemoverProduto({{$pedido_produto['produto']['id']}}, 1)"></i>
                                                </a>
                                                <span>{{$pedido_produto['qtd']}}</span>
                                                <a href="#" class="">
                                                    <i class="far fa-plus-circle" onclick="cestaAdicionarProduto({{$pedido_produto['produto']['id']}})"></i>
                                                </a>
                                            </div>
                                            <a href="#" onclick="cestaRemoverProduto({{$pedido_produto['produto']['id']}}, 0)"><small>Remover produto</a></small>
                                        </td>
                                        <td class="align-middle">R${{number_format($pedido_produto->produto->preco, 2, ',','.')}}</td>
                                        @php
                                            $total_produto = $pedido_produto->precos - $pedido_produto->descontos;
                                            $total_pedido += $total_produto;
                                        @endphp
                                        <td class='align-middle  font-weight-bold'>R${{number_format($total_produto, 2, ',','.')}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="align-middle font-weight-bold">Total</td>
                                        <td class="align-middle font-weight-bold">R${{number_format($total_pedido, 2, ',','.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <label for="cupomDesconto">Cupom de Desconto</label>
                                <input type="text" class="form-control col-lg-12 text-uppercase" name="cupomDesconto" id="cupomDesconto" placeholder="INSIRA SEU CUPOM">
                            </div> --}}
                        <form action="{{route('pagina.finalizar')}}" method='get'>
                            <button type='submit' class="btn btn-info text-center col-lg-3 mt-5 mb-4">Finalizar Compra</button>
                        </form>
                        {{-- </div> --}}
                @empty
                <div class="col-md-12 p-0 text-center">
                    <div class="my-4 p-5 p-auto">
                        <h4>Não há itens na sua cesta de compras ainda!</h4>
                        <a class="text-secondary" href="/">Volte para a página inicial.</a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <form id="form-remover-produto" method="POST" action="{{ route('cesta-compras.remover')}}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="pedido_id">
            <input type="hidden" name="produto_id">
            <input type="hidden" name="item">
        </form>
        <form id="form-adicionar-produto" method="POST" action="{{ route('cesta-compras.adicionar')}}">
        @csrf
        <input type="hidden" name="id">
        </form>
    </section>

<script src='./js/cesta-compras.js'></script>

@endsection