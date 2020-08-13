@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Contato
@endsection

<section class="container py-4">
    <h2 class="text-center mt-5">Contato</h2>
    <div class="row my-0 mx-3 mt-md-5">
        <!-- CAMPO DE MENSAGEM -->
        <section class="col-12 col-md-6 mx-auto p-0 mt-4 mt-md-0 mensagem">
            <form action="/contato" method="post" class="container-fluid px-0">
                <div class="form-cadastro">
                    <div class="card card-body mensagem mr-md-2">
                        <h3 class="text-center mb-4 mx-auto sliding-u-l-r-l">Fale conosco</h3>
                        <fieldset>
                            <form action="/contato" method="POST" id="formContato">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group has-error">
                                <input class="form-control input-lg text-capitalize" placeholder="Nome Completo" name="inputNome" value="{{ old('inputNome') }}" required>
                            </div>
                            <div class="form-group has-error">
                                <input type="email" class="form-control input-lg" placeholder="Email" name="inputEmail" value="{{ old('inputEmail') }}" required>
                            </div>
                            <div>
                                <textarea class="form-control{{$errors->has('inputMensagem') ? ' is-invalid':''}}" placeholder="Escreva aqui sua mensagem" name="inputMensagem" id="inputMensagem" rows="7" aria-describedby="#contatoTextoHelp" value="{{ old('inputMensagem') }}" required></textarea>
                                <div class="invalid-feedback">{{ $errors->first('inputMensagem') }}</div>
                            </div>
                            <div class="col-12 text-center py-4">
                                <input type="submit" class="btn btn-primary" value="Enviar">
                            </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </form>        
        </section>
        <!-- MAPA -->
        <section class="contato col-12 col-md-6 mx-auto mt-3 mt-md-0 p-0">
            <div class="card card-body mapa ml-md-2">
                <h3 class="text-center mb-2 mx-auto sliding-u-l-r-l">Onde estamos</h3>
                <p class="text-center mb-0">Av. Dr. Cardoso de Melo, 90</p>
                <p class="text-center mb-0">Vila Olímpia, São Paulo</p>
                <p class="text-center">Telefone:<a href="tel:+55113500-9839" class="ml-1" title="Estamos prontos para te atender. Entre em contato pelo telefone.">(11) 3500 9839</a></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.0480462713126!2d-46.67753668447493!3d-23.602609769003088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50ab7feb4519%3A0x739f0ddb0439cf94!2sDigital%20House%20S%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1592880053812!5m2!1spt-BR!2sbr" width="auto" height="284" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </section>
    </div>
    
    @if(!empty(Request::get('success')))
    <div class="alert alert-success text-center col-md-12 mt-5">
        {{ Request::get('success') }}
    </div>
    @endif
</section>

@endsection