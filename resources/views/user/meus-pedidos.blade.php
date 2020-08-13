@extends('layouts.user')

@section('content')

@section('title')
    Bake & Go | Meus Pedidos
@endsection

<section class="container py-5 mt-5 px-md adm-pag">
    <h2 class="mb-0">Meus Pedidos</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col" class="d-none d-md-table-cell">Data</th>
                    <th scope="col" class="d-none d-md-table-cell">Produto</th>
                    <th scope="col" class="d-none d-md-table-cell">Total</th>
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
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão Italiano</li>
                            <li class="list-group-item bg-transparent">Pão de Queijo</li>
                            <li class="list-group-item bg-transparent">Bolo de Chocolate</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$45</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Aguardando pagamento</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Aguardando confirmação</td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row" class="align-middle">002</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">06/06/2020</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão Francês x5</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$35</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Pago</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Preparando a massa</td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row" class="align-middle">003</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">07/06/2020</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Pão de Queijo 200g</li>
                        </ul>
                    </td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">R$25</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Rua Exemplo, 000 - Bairro - Cidade - SP - 09999-099</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">Pago</td>
                    <td scope="row" class="align-middle d-none d-md-table-cell">No forno</td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Modal - Conteúdo usuário -->
    <div class="modal fade" id="modalCont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pedido - 001</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header text-center">
                        Data
                        </div>
                        <div class="card-body">
                        <p class="card-text">05/06/2020</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Produto
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent">Pão Italiano</li>
                                <li class="list-group-item bg-transparent">Pão de Queijo</li>
                                <li class="list-group-item bg-transparent">Bolo de Chocolate</li>
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
                            <p class="card-text">Aguardando pagamento</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            Status
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="card-text">Aguardando confirmação</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mb-0" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection