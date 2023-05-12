@extends("layouts.client_layout")

@section('section_css')
    <link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php $nav = "accueil" ?>
<div class="content bg-light">
    <div style="background-image: url({{asset('/client/assets/img/banner_convention.gif')}});" class="banner">
        <div class="overlay container-fluid mt-2">
            <h2 class="text">
            </h2>
            <h3 class="text2"></h3>
        </div>
    </div>
</div>
<!-- andnonce des objectifs de la plateforme -->
<div class="container mt-5">
    <section class="our-webcoderskull padding-lg">
        <div class="container">
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/partenariat_dem.png')}}" class="img-responsive" alt=""></figure>
                            <p class="partenariat">Demander vos partenariats</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/partenariat_dem.png')}}" class="img-responsive" alt=""></figure>
                            <p>Demander vos conventions</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/gestion.png')}}" class="img-responsive" alt=""></figure>
                            <p>Gerer les partenariats</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/gestion.png')}}" class="img-responsive" alt=""></figure>
                            <p>Gerer les conventions</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</div>
<!-- fin d'annonce des objectifs de la plateforme -->


<section class="partners">
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
        <button class="btn btn-primary">
            <a href="{{route('all_partenariats')}}" style="color: white; text-decoration: none">Voir plus</a>
        </button>
    </div>
</section>

<style>
    .btn-primary {
        background-color: #92278f;
        border-color: #92278f;
    }

    .btn-primary:hover{
        color: white;
        background-color: rgb(18, 166, 80);;
        border-color: rgb(18, 166, 80);;
    }
</style>


@endsection()
