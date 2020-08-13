@extends('layouts.app')

@section('content')

@section('title')
    Bake & Go | Quem Somos
@endsection

<section class="jumbotron quem-somos-banner">
    <h2>Quem somos</h2>
</section>
<section class="container">
    <div class="quem-somos">
        <div class="row mx-auto" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-lg-6 w-100 my-auto text-center text-lg-left">
                <h2 class="mb-4">Desde 2020 fazendo os melhores pães.</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a tempor mi. Proin maximus, sapien in placerat dignissim, enim purus ultricies magna, a consectetur tortor sem interdum est. Suspendisse ut lorem et lorem molestie facilisis. Pellentesque tristique vel metus quis porta. Curabitur sapien ex, porttitor ac molestie nec, rutrum nec enim. Mauris finibus elementum scelerisque. Cras vehicula aliquam volutpat. Nulla quam est, ultrices sed mi cursus, fermentum rutrum massa. Cras ac feugiat mi, at semper justo. Fusce scelerisque lectus mauris, eget hendrerit sapien fringilla eu. Cras congue, risus non tempus consequat, nunc justo vulputate ligula, in vestibulum justo erat sed nisl. Sed malesuada consequat facilisis. Quisque venenatis sit amet tellus a malesuada. Sed quis erat aliquam, varius metus sit amet, consectetur magna.</p>
                <a href="/produtos" class="btn btn-primary quem-somos-btn mb-5">CONHEÇA NOSSOS PRODUTOS</a>
            </div>
            <div class="col-lg-5 col-md mx-auto order-lg-first">
                <img class="img-fluid mb-5" src="{{ asset('img/10_bakeandgo.jpg')}}" alt="Conheça e compre agora nossos produtos.">
            </div>
        </div>
    </div>
</section>

@endsection