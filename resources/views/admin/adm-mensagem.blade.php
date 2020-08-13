@extends('layouts.adm')

@section('content')

@section('title')
    Bake & Go | Adm. Mensagem
@endsection

<section class="container email-mensagem py-5 mt-5 px-md-0 adm-pag">
    <h2 class="mb-0">Mensagens</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" class="d-none d-md-table-cell">Nome</th>
                    <th scope="col" class="d-none d-md-table-cell">Email</th>
                    <th scope="col-2" class="d-none d-md-table-cell">Mensagem</th>
                    <th scope="col" class="d-none d-md-table-cell">Excluir</th>
                    <th scope="col" class="d-md-none d-table-cell">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td scope="row">{{ $message->id }}</td>
                    <td scope="row" class="d-none d-md-table-cell">{{ $message->nome }}</td>
                    <td scope="row" class="d-none d-md-table-cell">
                        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>

                    </td>
                    <td scope="row" class="d-none d-md-table-cell">
                        <p>{{ $message->mensagem }}</p>
                    </td>
                    <td scope="row" class="d-none d-md-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalDel{{ $message->id }}">
                            <i class="fas fa-trash-alt text-dark"></i>
                        </a>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalCont{{ $message->id }}">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalDel{{ $message->id }}">
                            <i class="fas fa-trash-alt text-dark"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal - Conteúdo mensagem -->
                <div class="modal fade" id="modalCont{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Mensagem de {{ $message->nome }}</h5>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center">
                                    Nome Completo
                                    </div>
                                    <div class="card-body">
                                    <p class="card-text">{{ $message->nome }}</p>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">
                                        Email
                                    </div>
                                    <div class="card-body">
                                        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">
                                        Mensagem
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $message->mensagem }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mb-0" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal - Excluir mensagem -->
                <div class="modal fade" id="modalDel{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Excluir mensagem</h5>
                            </div>
                            <div class="modal-body">
                                <p>Deseja realmente excluir esta mensagem?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Cancelar</button>
                                <form action="/admin/removeMessage/{{ $message->id }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger mb-0">Excluir</button>
                                </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $messages->onEachSide(0)->links() }}
        </div>
    </div>

        @if(!empty(Request::get('success')))
        <div class="alert alert-success text-center col-md-12 mt-5">
            {{ Request::get('success') }}
        </div>
        @endif
    </section>

@endsection