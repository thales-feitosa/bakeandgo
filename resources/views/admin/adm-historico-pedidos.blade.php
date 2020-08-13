@extends('layouts.adm')

@section('content')

@section('title')
    Bake & Go | Adm. Histórico de Pedidos
@endsection

<section class="container email-mensagem py-5 mt-5 px-md-0 adm-pag">
    <br>
    <h2 class="mb-0">Histórico de Pedidos</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col" class="d-none d-md-table-cell">Data</th>
                    <th scope="col" class="d-none d-md-table-cell">Cliente</th>
                    <th scope="col" class="d-none d-md-table-cell">Produto</th>
                    <th scope="col" class="d-none d-md-table-cell">Total</th>
                    <th scope="col" class="d-none d-md-table-cell">Endereço</th>
                    <th scope="col" class="d-none d-md-table-cell">Pagamento</th>
                    <th scope="col" class="d-none d-md-table-cell">Status</th>
                    <th scope="col" class="d-md-none d-table-cell">Opções</th>
                </tr>
            </thead>
            
    </div>
    </section>

    {{-- <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col" class="d-none d-md-table-cell">Data</th>
                    <th scope="col" class="d-none d-md-table-cell">Cliente</th>
                    <th scope="col" class="d-none d-md-table-cell">Produto</th>
                    <th scope="col" class="d-none d-md-table-cell">Valor Total</th>
                    <th scope="col" class="d-none d-md-table-cell">Endereço</th>
                    <th scope="col" class="d-none d-md-table-cell">Pagamento</th>
                    <th scope="col" class="d-none d-md-table-cell">Status</th>
                    <th scope="col" class="d-md-none d-table-cell">Opções</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="align-middle">001</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">05/06/2020</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Exemplilson da Silva 1</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão Italiano</li>
                            <li class="list-group-item bg-transparent">Pão de Queijo</li>
                            <li class="list-group-item bg-transparent">Bolo de Chocolate</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$45</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando pagamento</option>
                            <option value="2">Pago</option>
                        </select>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando confirmação</option>
                            <option value="1">Preparando a massa</option>
                            <option value="2">No forno</option>
                            <option value="3">Pronto para entrega</option>
                        </select>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row" class="align-middle">002</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">02/07/2020</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Exemplilson da Silva 2</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão Francês x5</li>
                            <li class="list-group-item bg-transparent">Pão de Queijo x3</li>
                            <li class="list-group-item bg-transparent">Bolo de Fubá</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$50</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando pagamento</option>
                            <option value="2">Pago</option>
                        </select>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando confirmação</option>
                            <option value="1">Preparando a massa</option>
                            <option value="2">No forno</option>
                            <option value="3">Pronto para entrega</option>
                        </select>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row" class="align-middle">003</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">11/07/2020</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Exemplilson da Silva 3</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão Francês x3</li>
                            <li class="list-group-item bg-transparent">Queijo 200g</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$20</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando pagamento</option>
                            <option value="2">Pago</option>
                        </select>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <select class="custom-select">
                            <option value="1">Aguardando confirmação</option>
                            <option value="1">Preparando a massa</option>
                            <option value="2">No forno</option>
                            <option value="3">Pronto para entrega</option>
                        </select>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
    </table>
    <!-- Modal - Conteúdo usuário -->
    <div class="modal fade" id="modalCont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pedido - 000</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header text-center">
                        Data
                        </div>
                        <div class="card-body">
                        <p class="card-text">01/01/2020</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Cliente
                        </div>
                        <div class="card-body">
                            <p class="card-text">Exemplilson da Silva</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Produto
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent">Pão Francês x5</li>
                                <li class="list-group-item bg-transparent">Pão de Queijo x3</li>
                                <li class="list-group-item bg-transparent">Bolo de Fubá</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Valor Total
                        </div>
                        <div class="card-body">
                            <p class="card-text">45,00</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Endereço
                        </div>
                        <div class="card-body">
                            <p class="card-text">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Pagamento
                        </div>
                        <div class="card-body">
                            <select class="custom-select">
                                <option value="1">Aguardando pagamento</option>
                                <option value="2">Pago</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Status
                        </div>
                        <div class="card-body">
                            <select class="custom-select">
                                <option value="1">Aguardando confirmação</option>
                                <option value="1">Preparando a massa</option>
                                <option value="2">No forno</option>
                                <option value="3">Pronto para entrega</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mb-0" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div> --}}
{{-- </section>
                
@endsection --}}