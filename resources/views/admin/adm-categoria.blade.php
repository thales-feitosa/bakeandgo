@extends('layouts.adm')

@section('content')

@section('title')
    Bake & Go | Adm. Categoria
@endsection

<section class="container py-5 mt-5 px-md-0 adm-pag">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h2 class="col-12 col-md-6 mb-0 px-0">Categorias</h2>
        <a href="#" class="text-dark" data-toggle="modal" data-target="#modalAdd"><p class="col-12 col-md-6 mt-3 mt-md-0 px-0 text-md-right">Adicionar uma categoria <i class="far fa-plus-circle text-dark"></i></a></p>
    </div>
    @if($categorias->isEmpty())
        <section class="row mx-2">
            <div class="col-12">
                <h3 class="text-center">Parece que ainda não temos nenhuma categoria!</h3>
            </div>
        </section>
    @else
        <div class="table mt-4">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="d-none d-md-table-cell">Categoria</th>
                        <th scope="col" class="d-none d-md-table-cell">Editar</th>
                        <th scope="col" class="d-none d-md-table-cell">Excluir</th>
                        <th scope="col" class="d-md-none d-table-cell">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td scope="row">{{ $categoria->id }}</td>
                            <td scope="row" class="d-none d-md-table-cell">{{ $categoria->categoria }}</td>
                            <td class="d-none d-md-table-cell">
                                <a href="#" data-toggle="modal" data-target="#modalEdit{{$categoria->id}}">
                                    <i class="fas fa-pencil-alt text-dark"></i>
                                </a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="#" data-toggle="modal" data-target="#modalDel{{$categoria->id}}">
                                    <i class="fas fa-trash-alt text-dark"></i>
                                </a>
                            </td>
                            <td scope="col" class="d-md-none d-table-cell">
                                <a href="#" data-toggle="modal" data-target="#modalCont{{$categoria->id}}">
                                    <i class="fas fa-eye mr-2 text-dark"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#modalEdit{{$categoria->id}}">
                                    <i class="fas fa-pencil-alt mr-2 text-dark"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#modalDel{{$categoria->id}}">
                                    <i class="fas fa-trash-alt text-dark"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal - Editar categoria -->
                        <div class="modal fade" id="modalEdit{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content col-12">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar categoria</h5>
                                    </div>
                                    <form action="/admin/adm-categoria/{{$categoria->id}}" method="POST" class="container">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        
                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label for="inputCategoria">Categoria</label>
                                                    <input type="text" name="categoria"  value="{{ old('categoria') }}" class="form-control{{$errors->has('categoria') ? ' is-invalid':''}}" id="inputCategoria" placeholder="{{$categoria->categoria}}">
                                                </div>
                                            </div>
                                        <div class="modal-footer pr-0">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal - Conteúdo categoria -->
                        <div class="modal fade" id="modalCont{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">ID - {{ $categoria->id }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-header text-center">
                                            Categoria
                                            </div>
                                            <div class="card-body">
                                            <p class="card-text">{{ $categoria->categoria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mb-0" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal - Excluir categoria -->
                        <div class="modal fade" id="modalDel{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir categoria</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir esta categoria?</p>
                                        <div class="card mt-4">
                                            <div class="card-header text-center">
                                                ID - {{ $categoria->id }}
                                            </div>
                                            <div class="card-body">
                                            {{ $categoria->categoria }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Cancelar</button>
                                        <form action="/admin/adm-categoria/{{$categoria->id}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button id="excluir-categoria" type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $categorias->onEachSide(0)->links() }}
            </div>
        </div>

    @endif
                        
        <!-- Modal - Adicione uma categoria -->
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content col-12">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar categoria</h5>
                    </div>
                    <form action="/admin/adm-categoria" method="POST" class="container">
                        @csrf
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="mt-2" for="inputCategoria">Categoria</label>
                                <input type="text" name="categoria" value="{{ old('categoria') }}" class="form-control {{$errors->has('categoria') ? ' is-invalid':''}}" id="inputCategoria">
                            </div>
                        </div>
                        <div class="modal-footer pr-0">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    @if(!empty(Request::get('success')))
        <div class="alert alert-success text-center col-md-12">
            {{ Request::get('success') }}
        </div>
    @endif
</section>

@endsection