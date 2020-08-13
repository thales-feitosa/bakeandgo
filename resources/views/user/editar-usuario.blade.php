@extends('layouts.user')

@section('content')

@section('title')
    Bake & Go | Editar Perfil
@endsection

<div class="container-fluid py-5 mt-5">
    <div class="form-cadastro">
        <div class="col-lg-6 mx-auto">
            <div class="card card-body">
                <h3 class="text-center mb-4">Editar meu perfil</h3>
                <fieldset>
                    <form action="/user/editar-usuario/{{ $user->id }}" method="POST">     
                        @csrf
                        {{ method_field('PUT')}}
                    <div class="form-group has-error">
                        <input type="text" class="form-control" aria-describedby="nomeCadastroHelp" id="inputNome" name="inputNome" value="{{$user->nome}}" required>
                    </div>
                    <div class="form-group has-error">
                        <input type="text" class="form-control text-capitalize" placeholder="Alterar Endereço Atual" aria-describedby="enderecoHelp" id="inputEndereco" name="inputEndereco" value="{{$user->endereco}}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" placeholder="CEP" name="inputCep" value="{{$user->cep}}" required>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control text-capitalize" placeholder="Cidade"  name="inputCidade" value="{{$user->cidade}}" required>
                        </div>
                        <div class="form-group col-md-2">
                            <select class="form-control" name="inputUF" id="inputUF" required>
                                <option disabled="" selected="">UF</option>
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
                                    <option value="SP">SP</option>                                        <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <input type="text" class="form-control input-lg" placeholder="Email"  aria-describedby="emailHelp" id="inputEmail" name="inputEmail" value="{{$user->email}}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="password" name="inputSenha" class="form-control{{$errors->has('inputSenha') ? ' is-invalid':''}}" placeholder="Senha" aria-describedby="senhaHelp" id="inputSenha"> 
                            <div class="invalid-feedback">{{ $errors->first('inputSenha') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control{{$errors->has('inputConfirma') ? ' is-invalid':''}}" placeholder="Confirma senha" aria-describedby="ConfirmaHelp" id="inputConfirma" name="inputConfirma">
                            <div class="invalid-feedback">{{ $errors->first('inputConfirma') }}</div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <input type="submit" class="btn btn-primary text-center" value="Confirmar">
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

@if(!empty(Request::get('success')))
    <div class="alert alert-success text-center col-md-12">

        {{ Request::get('success') }}
    </div>
@endif

@endsection