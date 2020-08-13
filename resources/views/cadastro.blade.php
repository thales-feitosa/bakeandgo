@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Cadastro
@endsection

<!-- Form - Cadastro -->
<div class="container-fluid py-5 mt-5">
    <div class="form-cadastro">
        <div class="col-lg-6 mx-auto">
            @if(!empty(Request::get('success')))
            <div class="alert alert-success text-center col-md-12">
                {{ Request::get('success') }}
            </div>
            @endif
            <div class="card card-body">
                <h3 class="text-center mb-4">Criar uma conta</h3>
                <fieldset>
                    <form action="cadastro" method="POST" id="formCadastro">
                    {{ method_field('POST') }}
                    @csrf
                    <div class="form-group has-error">
                        <label for="inputNome">Nome Completo</label> 
                        <input type="text" class="form-control{{$errors->has('inputNome') ? ' is-invalid':''}} input-lg text-capitalize" placeholder="Insira seu nome completo"  aria-describedby="nomeCadastroHelp" id="inputNome" name="inputNome" value="{{ old('inputNome') }}" oninvalid="Preencha o seu nome completo" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="number" class="form-control{{$errors->has('inputCPF') ? ' is-invalid':''}}" placeholder="Insira seu CPF" aria-describedby="CPFCadastroHelp"  id="inputCPF" name="inputCPF" value="{{ old('inputCPF') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputRG">RG</label>                                        
                            <input type="number" class="form-control{{$errors->has('inputRG') ? ' is-invalid':''}}" placeholder="Insira seu RG" aria-describedby="RGCadastroHelp" id="inputRG" name="inputRG" value="{{ old('inputRG') }}" required>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputEndereco">Endereço</label>
                        <input type="text" class="form-control{{$errors->has('inputEndereco') ? ' is-invalid':''}} text-capitalize" placeholder="Endereço" aria-describedby="enderecoHelp" id="inputEndereco" name="inputEndereco" value="{{ old('inputEndereco') }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCep">CEP</label>
                            <input type="text" class="form-control{{$errors->has('inputCep') ? ' is-invalid':''}}" placeholder="00000-000" name="inputCep" value="{{ old('inputCep') }}" required>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control{{$errors->has('inputCidade') ? ' is-invalid':''}} text-capitalize" placeholder="Cidade" name="inputCidade" value="{{ old('inputCidade') }}" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputUF">UF</label>
                            <select class="form-control{{$errors->has('inputuf') ? ' is-invalid':''}}" name="inputUF" id="inputUF" required>
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
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control{{$errors->has('inputEmail') ? ' is-invalid':''}} input-lg" placeholder="Email" aria-describedby="emailHelp" id="inputEmail" name="inputEmail" value="{{ old('inputEmail') }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control{{$errors->has('inputSenha') ? ' is-invalid':''}}" placeholder="Senha" aria-describedby="senhaHelp" id="inputSenha" name="inputSenha" required>
                            <div class="invalid-feedback">{{ $errors->first('inputSenha') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfirma">Confirma Senha</label>
                            <input type="password" class="form-control{{$errors->has('inputConfirma') ? ' is-invalid':''}}" placeholder="Confirma senha" aria-describedby="ConfirmaHelp" id="inputConfirma" name="inputConfirma" required>
                            <div class="invalid-feedback">{{ $errors->first('inputConfirma') }}</div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" required>
                            <span class="custom-control-label d-inline-block">Estou de acordo com os <a data-toggle="modal" href="#termosDeUso">Termos de Uso.</a></span>
                        </label>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <input type="submit" class="btn btn-primary text-center" value="Cadastrar">
                    </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>

@endsection