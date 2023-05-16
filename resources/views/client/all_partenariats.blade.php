@extends("layouts.client_layout")

@section('section_css')
    <link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
    <?php $nav = "accueil" ?>
    <section class="partners mt-5">
        <h2 class="part">Nos partenaires</h2>
        <div class="partners-container">
            <ul class="partners-list">
                <li>
                    <a href="#">
                        <img src="{{asset('client/assets/img/missions/logo-mtn.png')}}" alt="Nom du partenaire 1">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Nom du partenaire 2">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{asset('client/assets/img/missions/logo-mtn.png')}}" alt="Nom du partenaire 3">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Nom du partenaire 2">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{asset('client/assets/img/missions/logo-mtn.png')}}" alt="Nom du partenaire 3">
                    </a>
                </li>
            </ul>
        </div>
    </section>


@endsection()
