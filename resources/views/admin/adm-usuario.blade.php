@extends('layouts.adm')

@section('content')

@section('title')
    Bake & Go | Adm. Usuário
@endsection

<section class="container py-5 mt-5 px-md-0 adm-pag">
    <h2 class="mb-0">Usuários</h2>
    @if($users->isEmpty())
        <section class="row mx-2">
            <div class="col-12">
                <h3 class="text-center">Parece que ainda não temos nenhum usuário!</h3>
            </div>
        </section>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" class="d-none d-md-table-cell">Admin</th>
                    <th scope="col" class="d-none d-md-table-cell">Nome</th>
                    <th scope="col" class="d-none d-md-table-cell">CPF</th>
                    <th scope="col" class="d-none d-md-table-cell">Endereço</th>
                    {{-- <th scope="col" class="d-none d-md-table-cell">CEP</th> --}}
                    {{-- <th scope="col" class="d-none d-md-table-cell">Cidade</th> --}}
                    {{-- <th scope="col" class="d-none d-md-table-cell">UF</th> --}}
                    <th scope="col" class="d-none d-md-table-cell">Email</th>
                    {{-- <th scope="col" class="d-none d-md-table-cell">Editar</th> --}}
                    <th scope="col" class="d-none d-md-table-cell">Excluir</th>
                    <th scope="col" class="d-md-none d-table-cell">Admin</th>
                    <th scope="col" class="d-md-none d-table-cell">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td scope="row" class="d-none d-md-table-cell">
                        <form action="/admin/toggleAdmin/{{$user->id}}" method="post">
                            @csrf
                            {{ method_field('PUT')}} 
                            @if($user->admin==null||$user->admin==0)
                            <input type="hidden" name="admin" value='1'>
                            <button type='submit' class="btn btn-primary btn-sm"><i class="fas fa-user-alt-slash"></i></button>
                            @else
                            <input type="hidden" name="admin" value='0'>
                            <button type="submit" class="btn btn-primary btn-sm">Admin <i class="fas fa-user-alt"></i></button>
                            @endif
                        </form>
                    </td>
                    <td scope="row" class="d-none d-md-table-cell">{{ $user->nome }}</td>
                    <td scope="row" class="d-none d-md-table-cell">{{ $user->cpf }}</td>
                    <td scope="row" class="d-none d-md-table-cell">{{ $user->endereco }} - {{ $user->cidade }}/{{ $user->uf }} - {{ $user->cep }}</td>
                    <td scope="row" class="d-none d-md-table-cell">{{ $user->email }}</td>
                    {{-- <td class="d-none d-md-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalEdit{{ $user->id }}">
                            <i class="fas fa-pencil-alt text-dark"></i>
                        </a>
                    </td> --}}
                    <td class="d-none d-md-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalDel{{ $user->id }}">
                            <i class="fas fa-trash-alt text-dark"></i>
                        </a>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <form action="/admin/toggleAdmin/{{$user->id}}" method="post">
                            @csrf
                            {{ method_field('PUT')}} 
                            @if($user->admin==null||$user->admin==0)
                            <input type="hidden" name="admin" value='1'>
                            <button type='submit' class="btn btn-primary btn-sm"><i class="fas fa-user-alt-slash"></i></button>
                            @else
                            <input type="hidden" name="admin" value='0'>
                            <button type="submit" class="btn btn-primary btn-sm">Admin <i class="fas fa-user-alt"></i></button>
                            @endif
                        </form>
                    </td>
                    <td scope="col" class="d-md-none d-table-cell">
                        <a href="#" data-toggle="modal" data-target="#modalConteudo{{ $user->id }}">
                            <i class="fas fa-eye mr-2 text-dark"></i>
                        </a>
                        {{-- <a href="#" data-toggle="modal" data-target="#modalEdit{{ $user->id }}">
                            <i class="fas fa-pencil-alt mr-2 text-dark"></i>
                        </a> --}}
                        <a href="#" data-toggle="modal" data-target="#modalDel{{ $user->id }}">
                            <i class="fas fa-trash-alt text-dark"></i>
                        </a>
                    </td>
                </tr>

                <!-- Modal - Editar usuário -->
                {{-- <div class="modal fade text-left" id="modalEdit{{ $user->id }}" role="dialog" tabindex="-1"  aria-labelledby="modalEditLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel">Editar usuário - ID {{ $user->id }}</h5>
                            </div>
                            <form action="/admin/adm-usuario/{{$user->id}}" method="POST" class="container">
                                @csrf
                                {{ method_field('PUT') }}
                                <form class="container">
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputNome">Nome Completo</label>
                                                <input type="text" name="inputNome" value="{{$user->nome}}" class="form-control" id="inputNome" placeholder="{{$user->nome}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCPF">CPF</label>
                                                <input type="number" name="inputCPF" value="{{$user->cpf}}" class="form-control" id="inputCPF" placeholder="{{$user->cpf}}" readonly aria-describedby="CPFCadastroHelp">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRG">RG</label>                                        
                                                <input type="number" name="inputRG" value="{{$user->rg}}" class="form-control" id="inputRG" placeholder="{{$user->rg}}" readonly aria-describedby="RGCadastroHelp">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEndereco">Endereço</label>
                                            <input type="text" name="inputEndereco" value="{{$user->endereco}}" class="form-control" id="inputEndereco" placeholder="{{$user->endereco}}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputCep">CEP</label>
                                                <input type="text" name="inputCep" value="{{$user->cep}}" class="form-control" id="inputCep" placeholder="{{$user->cep}}" required>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="inputCidade">Cidade</label>
                                                <input type="text" name="inputCidade" value="{{$user->cidade}}" class="form-control" id="inputCidade" placeholder="{{$user->cidade}}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputUF">UF</label>
                                                <select name="inputUF" value="{{$user->uf}}" class="form-control" id="inputUF" placeholder="{{$user->uf}}" required>
                                                    <option disabled="">UF</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AM">AM</option>
                                                    <option value="AP">AP</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MG">MG</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MT">MT</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="PR">PR</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="RS">RS</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" name="inputEmail" value="{{$user->email}}" class="form-control" id="inputEmail" placeholder="{{$user->email}}" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputSenha">Nova senha</label>
                                                <input type="password" name="inputSenha" value="{{ old('inputSenha') }}" class="form-control" id="inputSenha" placeholder="Nova senha" aria-describedby="senhaHelp">
                                                <div class="invalid-feedback">{{ $errors->first('inputSenha') }}</div> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputConfirma">Confirmar nova senha</label>
                                                <input type="password" name="inputSenha" value="{{ old('inputSenha') }}" class="form-control" id="inputConfirma" placeholder="Confirmar nova senha" aria-describedby="ConfirmaHelp">
                                                <div class="invalid-feedback">{{ $errors->first('inputConfirma') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-3">
                                        <button type="submit" class="btn btn-primary">Editar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Modal - Conteúdo usuário -->
                    <div class="modal fade" id="modalConteudo{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confira abaixo os dados de {{$user->nome}} </h5>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header text-center">
                                        Nome Completo
                                        </div>
                                        <div class="card-body">
                                        <p class="card-text">{{ $user->nome }}</p>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header text-center">
                                        CPF
                                        </div>
                                        <div class="card-body">
                                        <p class="card-text">{{ $user->cpf }}</p>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header text-center">
                                        RG
                                        </div>
                                        <div class="card-body">
                                        <p class="card-text">{{ $user->rg }}</p>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header text-center">
                                            Endereço
                                        </div>
                                        <div class="card-body ">
                                            <p class="card-text">{{ $user->endereco }} - {{ $user->cidade }}/{{ $user->uf }} - {{ $user->cep }}</p>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header text-center">
                                            Email
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $user->email }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary mb-0" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal - Excluir usuário -->
                    <div class="modal fade" id="modalDel{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Excluir usuário</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja realmente excluir este usuário?</p>
                                </div>
                                <div class="modal-body text-left">
                                    <p>ID: {{ $user->id }}</p>
                                    <p>Nome: {{ $user->nome }}</p>
                                    <p>Email: {{ $user->email }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Cancelar</button>
                                    <form action="/admin/adm-usuario/{{ $user->id }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button id="excluir-usuario" type="submit" class="btn btn-danger mb-0">Excluir</button>
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
                {{ $users->onEachSide(0)->links() }}
            </div>
        </div>
            
            @if(!empty(Request::get('success')))
            <div class="alert alert-success text-center col-md-12 mt-5">
                {{ Request::get('success') }}
            </div>
            @endif
        </section>

@endsection