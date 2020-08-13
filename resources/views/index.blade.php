@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go
@endsection

<section class="banner">
  <div class="container d-flex h-100 align-items-center">
    <div class="mx-auto text-center">
      <h1 class="mx-auto my-0" data-aos="fade-up" data-aos-duration="1500">Baked & fresh</h1>
      <h2 class="mx-auto mt-2 mb-5" data-aos="fade-up" data-aos-duration="1500">Do pão de fermentação natural ao pão integral, não importa a hora, nós iremos até você.</h2>
    </div>
  </div>
</section>
<!-- Section com produtos-->
<section class="catProdutos">
  <div class="col-lg-10 mx-auto col-12 text-center mb-3">
    <h3 class="mt-5 mb-4 text-uppercase"><i class="fal fa-wheat fa-lg mt-4 mr-3"></i>Conheça nossos produtos<i class="fal fa-wheat fa-lg ml-3"></i></h3>
    <hr class="accent my-5">
  </div>
  <div class="row" data-aos="fade-up" data-aos-duration="1500">
    <div class="col-lg-6 w-100 my-auto text-center text-lg-right">
      <h2>Pão Italiano</h2>
      <p></p>
      {{-- <a href="/cesta-compras">
        <button type="submit" class="btn hvr-icon-basket mb-4">Add a Cesta <i class="fa fa-shopping-basket hvr-icon"></i></button></a> --}}
    </div>
    <div class="col-lg-5 col-md mx-auto">
      <img class="img-fluid" src="{{ asset("img/03_bakeandgo.jpg") }}" alt="Conheça nosso pão artesanal, feito com fermetação natural.">
    </div>
  </div>
  <div class="row" data-aos="fade-up" data-aos-duration="1500">
    <div class="col-lg-6 w-100 my-auto text-center text-lg-left">
      <h2>Pão Francês Rústico</h2>
      <p></p>
      {{-- <a href="/cesta-compras">
        <button type="submit" class="btn hvr-icon-basket mb-4">Add a Cesta <i class="fa fa-shopping-basket hvr-icon"></i></button></a> --}}
      </div>
      <div class="col-lg-5 col-md mx-auto order-lg-first">
        <img class="img-fluid" src="{{ asset("img/05_bakeandgo.jpg") }}" alt="Conheça nosso bolo de chocolate com frutas vermelhas.">
      </div>
    </div>
  </section>    
  <!-- Menu -->
  <section class="menu-produtos">
    <div class="container">
      <div class="row-menu">
        <div class="col-lg-10 mx-auto col-12 text-center mb-3">
          <h3 class="mt-5 mb-4 text-uppercase"><i class="fal fa-wheat fa-lg mt-4 mr-3"></i>Menu<i class="fal fa-wheat fa-lg ml-3"></i></h3>
          <hr class="accent my-5">
        </div>
        <div class="card-columns" data-aos="fade-up" data-aos-duration="1500">
          <div class="card card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h3 class="text-truncate sliding-u-l-r-l">Pão Italiano</h3>
              <h4>R$12</h4>
            </div>
            <p class="small"></p>
            <div class="options">
              <p class="form-inline-block float-left mr-2" name="qtd"><small>Qtd</p></small>
              <select class="qtd" name="qtd">
                <option selected value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
              </select>
              <span class="float-right">
                <a href="/cesta-compras" class="btn btn-primary float-right">Add a Cesta</a>
              </span>
            </div>  
          </div>
          <div class="card card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h3 class="text-truncate sliding-u-l-r-l">Bagel</h3>
              <h4>R$8</h4>
            </div>
            <p class="small"></p>
            <div class="options">
              <p class="form-inline-block float-left mr-2" name="qtd"><small>Qtd</p></small>
              <select class="qtd" name="qtd">
                <option selected value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
              </select>
              <span class="float-right">
                <a href="/cesta-compras" class="btn btn-primary float-right">Add a Cesta</a>
              </span>
            </div>
          </div>
          <div class="card card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h3 class="text-truncate sliding-u-l-r-l">Ciabatta</h3>
              <h4>R$14</h4>
            </div>
            <p class="small"></p>
            <div class="options">
              <p class="form-inline-block float-left mr-2" name="qtd"><small>Qtd</p></small>
              <select class="qtd" name="qtd">
                <option selected value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
              </select>
              <span class="float-right">
                <a href="/cesta-compras" class="btn btn-primary float-right">Add a Cesta</a>
              </span>
            </div>
          </div>
          <div class="card card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h3 class="text-truncate sliding-u-l-r-l">Croissant</h3>
              <h4>R$10</h4>
            </div>
            <p class="small"></p>
            <div class="options">
              <p class="form-inline-block float-left mr-2" name="qtd"><small>Qtd</p></small>
              <select class="qtd" name="qtd">
                <option selected value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
              </select>
              <span class="float-right">
                <a href="/cesta-compras" class="btn btn-primary float-right">Add a Cesta</a>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-5 mb-3 text-center">
        <a href="/menu" class="btn btn-primary mb-5 text-uppercase">Ver menu</a>
      </div>
    </div>
  </section>
  <!-- Section - Contador -->
  <section class="counter-section img" id="section-counter">
    <div class="container">
      <div class="row justify-content-center py-5 mx-0 mx-md-5">
        <div class="col-md-12">
          <div class="row" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-md-4 d-flex justify-content-center counter-wrap animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="1202">1202</strong>
                  <span class="mt-2">Pães assados este mês</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center counter-wrap animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="476">476</strong>
                  <span class="mt-2">Entregas realizadas</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center counter-wrap animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="625">625</strong>
                  <span class="mt-2">Clientes satisfeitos</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section - Atendimento -->
  <section class="catAtendimento">
    <div class="row py-4 mx-0 mx-md-5" data-aos="fade-up" data-aos-duration="1500">
      <div class="col-lg-6 w-100 my-auto mb-4 text-lg-left">
        <h3>Das nossas mão para sua mesa!</h3>          
        <h4>Peça também pelo <a href="#">WhatsApp<i class="ic-wa fab fa-whatsapp fa-lg text-dark ml-2"></a></i></h4>
        <h4 class="mt-5 mb-2">Atendimento e delivery</h4>
        <p class="mb-0">Segunda — Sexta, das 9h às 17h</p>
        <p class="mb-5">Sábado — Domingo, das 10h às 16h</p>    
      </div>                 
      <div class="col-lg-6 order-lg-first">
        <img class="img-fluid" src="{{ asset("img/07_bakeandgo.jpg") }}" alt="Faça seu pedido também pelo WhatsApp.">
      </div>
    </div>
  </section>
  
@endsection
