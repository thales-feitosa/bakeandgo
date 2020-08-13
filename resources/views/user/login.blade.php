@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Login 
@endsection

<div class="container-fluid py-5">
    <div class="py-4">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card text-center bg-light py-3">{{ __('Acesse sua conta') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.login.do') }}">
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-8">
                            @if ($errors->all())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center py-2">
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="E-mail" autofocus>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary text-center">
                                    {{ __('Login') }}
                                </button>
                                <p class="mt-3">Novo por aqui? <a href="/cadastro" class="d-inline-block">Cadastre-se agora!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection