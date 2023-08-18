@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php

use App\Models\Demandepartenariat;

$nav = "accueil" ?>
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
                    <a href="{{route('client.partenariat')}}">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/partenariat_dem.png')}}"
                                    class="img-responsive" alt=""></figure>
                            <p class="partenariat">Demande de partenariats</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="{{route('client.convention')}}">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/partenariat_dem.png')}}"
                                    class="img-responsive" alt=""></figure>
                            <p>Demander vos conventions</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="{{route('client.partenariat')}}">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/gestion.png')}}"
                                    class="img-responsive" alt=""></figure>
                            <p>Gestion des partenariats</p>
                        </div>
                    </a>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <a href="{{route('client.partenariat')}}">
                        <div class="cnt-block equal-hight" style="height: 200px;" id="partenaire">
                            <figure><img src="{{asset('client/assets/img/missions/gestion.png')}}"
                                    class="img-responsive" alt=""></figure>
                            <p>Gestion des conventions</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</div>
<!-- fin d'annonce des objectifs de la plateforme -->
<?php $partenariats = Demandepartenariat::all()->take('6');  ?>
<section class="partners">
    <h2 class="part">Nos partenaires</h2>
    <div class="partners-container">

        <div class="col-lg-12">
            <div class="row">
                @foreach($partenariats as $partenariat)
                <div class="col-sm-4">
                    <div class="media-item">
                        <img src="{{asset('/docs/images/lms/'. $partenariat->logo)}}" alt="Description de l'image"
                            width="50%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <a href="{{route('all_partenariats')}}" class="btn btn-primary" style="color: white; text-decoration: none">Voir
            plus</a>

    </div>
</section>

<style>
.btn-primary {
    background-color: #92278f;
    border-color: #92278f;
}

.btn-primary:hover {
    color: white;
    background-color: rgb(18, 166, 80);
    ;
    border-color: rgb(18, 166, 80);
    ;
}
</style>


@endsection()