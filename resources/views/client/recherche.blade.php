@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php
$nav = "accueil";

use Carbon\Carbon;

$nav = "recherche" ?>

@if (session('status'))
<div align='center' class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        border-radius: 5px;
    }

    .card-header {
        background-color: #92278f;
        color: white;
        padding: 10px 15px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        text-align: center;
    }

    .card:hover {
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        /* Ombre plus prononcée au survol */
        transform: translateY(-5px);
        /* Déplace légèrement la carte vers le haut */
    }




    .card-body {
        padding: 20px;
        min-height: 500px;
    }

    .row {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .col-sm-4 {
        flex-basis: 30%;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Centrer les éléments verticalement */
        margin-bottom: 20px;
    }

    .media-item img {
        width: 100%;
        max-width: 200px;
        /* Limiter la taille des images */
        margin: 10px 0;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Adaptations spécifiques pour aligner les boutons sans utiliser le style en ligne */
    .col-sm-4:nth-child(1) .btn-primary {
        align-self: flex-start;
    }

    .col-sm-4:nth-child(3) .btn-primary {
        align-self: flex-end;
    }


    /* partie droite { */
    .sidebar-wrapper {
        padding: 20px;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        border-radius: 5px;
        transition: box-shadow 0.3s ease,
            transform 0.3s ease;
        margin-bottom: 20px;
        /* Espace entre les éléments */
    }

    .sidebar-item-dark {
        background-color: #f7f7f7;
        /* Un fond légèrement différent pour distinguer les éléments */
        border-radius: 5px;
        /* Bordures arrondies */
        padding: 15px;
        /* Espacement interne */
        margin-bottom: 20px;
        /* Espace entre les éléments */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        /* Ombre plus légère */
    }

    .sidebar-item-dark:hover,
    .sidebar-item:hover {
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
    }

    .btn-blue.btn-red {
        color: white;
        background-color: #92278f;
        /* Couleur de fond */
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
        /* Transition pour le survol */
    }

    .btn-blue.btn-red:hover {
        background-color: #a8329e;
        /* Couleur légèrement différente au survol */
    }

    .form-control {
        border-radius: 5px;
        /* Bordures arrondies pour les champs de formulaire */
        border: 1px solid #ccc;
        padding: 10px;
    }

    .partners-container {
        overflow: hidden;
    }

    .row {
        display: flex;
        transition: transform 0.3s ease-in-out;
        /* Assure une transition douce */
    }

    .col-sm-4 {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
    }
</style>

<div class="content bg-light" style="margin-bottom:20px">
    <div style="background-image: url({{asset('/client/assets/img/banner_convention.gif')}});" class="banner">
        <div class="overlay container-fluid mt-2">
            <h2 class="text">
            </h2>
            <h3 class="text2"></h3>
        </div>
    </div>
</div>
<?php
$partnerWithMaxActivites = $partners->filter(function ($partner) {
    return $partner->activites->count() >= 5;
})->sortByDesc(function ($partner) {
    return $partner->activites->count();
})->first();

$partnerWithMoyenActivites = $partners->filter(function ($partner) {
    return $partner->activites->count() < 5 && $partner->activites->count() >= 3;
})->sortByDesc(function ($partner) {
    return $partner->activites->count();
})->first();

$partnerWithLowActivites = $partners->filter(function ($partner) {
    return $partner->activites->count() < 3;
})->sortByDesc(function ($partner) {
    return $partner->activites->count();
})->first();
?>
<div class=" row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header" style="background-color: #92278f; font-size:25px">
                            Classement de nos partenaires
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4" style="min-height:150px">
                                    <h3>Partenaires très dynamiques</h3>
                                    <div class="media-item">
                                        <img src="{{asset('/docs/images/lms/'. $partnerWithMaxActivites->image_convention)}}" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('client.tres_dynamique')}}" class="btn btn-primary">
                                            Voir Plus</a>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="min-height:150px; ">
                                    <h3 style="text-align:center">Partenaires dynamiques
                                    </h3>
                                    <div class=" media-item" style="margin-bottom:60px">
                                        <img src="{{asset('/docs/images/lms/'. $partnerWithMoyenActivites->image_convention)}}" alt="image">
                                    </div>
                                    <div>

                                        <a href="{{route('client.dynamique')}}" class="btn btn-primary">
                                            Voir Plus</a>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="min-height:150px">
                                    <h3>Partenaires moins dynamiques</h3>
                                    <div class="media-item">
                                        <img src="{{asset('/docs/images/lms/'. $partnerWithLowActivites->image_convention)}}" alt="image">
                                    </div><br><br>
                                    <div>
                                        <a href="{{route('client.moins_dynamique')}}" class="btn btn-primary">
                                            Voir Plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="sidebar-sticky" class="col-md-4" style="margin-top:140px">
        <aside class="detail-sidebar sidebar-wrapper">
            <div class="sidebar-item sidebar-item-dark">
                <div class="detail-title">
                    <h3>Recherche</h3>
                </div>
                <form action="{{route('client.recherche')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name='mot' id="Name" placeholder="recherchez par continent, pays, ville, convention">
                        </div>
                        <div class="col-xs-12">
                            <div class="comment-btn">
                                <input class="btn-blue btn-red" style="background-color: #92278f;" type="submit" value="Recherche">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div align="center" class="sidebar-item">
                <div class="swiper-content" data-animation="animated fadeInRight">
                    <a href="{{route('client.partenariat')}}" class="btn-blue btn-red" style="color: white;">DEVENEZ
                        PARTENAIRE</a>
                </div>
            </div>
        </aside>
    </div>
</div>
</div>
</section>
<!-- Destinations -->
<section class="destinations">
    <div class="container">
        <h3 style="color:black; font-weight:bold">RESULTATS DE LA RECHERCHE</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="destination-outer" id="convention_content">
                            @foreach($searchs as $search)
                            <div class="destination-fw-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="destination-fw-image">
                                            <img src="{{asset('docs/images/lms/'.$search->logo)}}" style="width:70%" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="destination-fw-desc fw-content">
                                            <h3><a href="{{route('client.info', $search->id)}}">{{$search->libelle_structure}}</a>
                                            </h3>
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-btns">
                                            <div class="destination-btns">
                                                <a href="{{route('client.info', $search->id)}}" class="btn-blue btn-red" tabindex="0">Voir Plus</a>
                                            </div>
                                        </div>
                                        <div style="padding-top:20px" class="destination-fw-content">
                                            <p class="fw-info"> Date de Signature:<br> <i class="fa fa-clock-o" aria-hidden="true"> </i>
                                                {{ \Carbon\Carbon::parse($search->created_at)->format('d-m-Y') }}
                                            </p>
                                            <hr>
                                            <p class="fw-info"> Date de fin:<br> <i class="fa fa-clock-o" aria-hidden="true"> </i>
                                                {{ \Carbon\Carbon::parse($search->date_fin)->format('d-m-Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Destination Ends -->
<section class="partners">
    <h2 class="part">Nos partenaires</h2>
    <div class="partners-container">

        <div class="col-lg-12">
            <div class="row">
                @foreach($partners as $partner)
                <div class="col-sm-4">
                    <div class="media-item">
                        <img src="{{asset('/docs/images/lms/'. $partner->demande->logo)}}" alt="" width="50%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <a href="{{route('all_partenariats')}}" class="btn btn-primary" style="color: white; text-decoration: none">Voir
            plus</a>
    </div>
</section>
<!-- Destination Ends -->

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

    #sidebar-sticky {
        margin-bottom: 70px;
    }

    .detail-tabs #sidebar-sticky {
        margin-bottom: 0;
    }

    .sidebar-item {
        border: 1px solid #f1f1f1;
        box-shadow: 0px 0px 20px #cccccc57;
        margin-bottom: 30px;
        padding: 15px;
    }

    .sidebar-item-dark {
        background: #333;
    }

    .sidebar-item-dark .detail-title h4 {
        color: #fff;
        background: #333;
    }

    .sidebar-item .detail-title {
        margin-bottom: 15px;
    }

    .detail-title {
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        background: transparent;
    }

    .detail-title:after {
        position: absolute;
        top: 51%;
        content: '';
        background: #f1f1f1;
        height: 1px;
        width: 100%;
    }

    .sidebar-item-dark .detail-title h3 {
        background: #951b81;
        color: #fff;
        border: none;
    }

    .sidebar-item .detail-title h3 {
        padding: 5px 15px;
    }

    .detail-title h3,
    .detail-title h4 {
        display: inline-block;
        margin: 0;
        padding-right: 20px;
        border: 1px solid #f1f1f1;
        padding: 8px 16px;
        background: #fbfbfb;
    }

    .swiper-content {
        z-index: 1;
    }

    .slider .swiper-content h3 {
        color: #fff;
        margin: 16px 0 12px;
        font-size: 15px;
        position: relative;
        padding: 0;
        line-height: normal;
        font-weight: normal;
        display: inline-block;
    }

    .comment-btn {
        margin-top: 10px;
    }

    .sidebar-item .comment-btn .btn-blue {
        display: block;
        width: 100%;
        text-align: center;
        color: #fff;
    }

    .btn-red {
        background: #951b81;
        border-color: #951b81;
    }

    .btn-blue {
        border: 1px solid #951b81;
        padding: 7px 25px;
        display: inline-block;
        background: #951b81;
        color: #fff;
        transition: all ease-in-out 0.3s;
        cursor: pointer;
    }

    h3 {
        font-size: 24px;
        /* margin-top: 20px; */
        /* margin-bottom: 10px;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit; */
        margin: 40px;
        /* padding: 0;
    border: 0;
    outline: 0; */
    }

    .col-md-8 {
        width: 66.66666667%;
    }

    /* resultat recherche */



    .destinations {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        background-color: #f9f9f9;
        padding: 20px 0;
    }

    .destinations .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .destinations h3 {
        color: #007bff;
        margin-bottom: 30px;
        text-align: center;
    }

    .destination-outer {
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow: hidden;
    }

    .destination-fw-item {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .destination-fw-item:last-child {
        border-bottom: 0;
    }

    .destination-fw-image img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .destination-fw-desc h3 {
        margin: 10px 0;
        color: #333;
    }

    .destination-fw-desc p {
        color: #666;
    }

    .btn-blue {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-blue:hover,
    .btn-blue:active {
        background-color: #0056b3;
    }

    .fw-btns {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fw-info {
        font-size: 14px;
        color: #666;
    }

    .fa-clock-o {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .destination-fw-item {
            flex-direction: column;
        }

        .destination-fw-item .col-md-4,
        .destination-fw-item .col-md-5,
        .destination-fw-item .col-md-3 {
            width: 100%;
        }

        .fw-btns {
            margin-top: 20px;
        }
    }
</style>



<script>
    $(document).ready(function() {
        let currentPosition = 0;
        const totalItems = $(".partners-container .col-sm-4").length;
        const itemsPerView = 3;
        const viewWidth = 100; // Pourcentage du conteneur visible par déplacement
        const totalViews = Math.ceil(totalItems / itemsPerView);

        function showNextView() {
            currentPosition = (currentPosition + 1) % totalViews;
            const transformValue = -(viewWidth * currentPosition) + '%';

            // Applique le décalage pour déplacer les images
            $(".partners-container .row").css('transform', `translateX(${transformValue})`);

            // Vérifie si on doit réinitialiser pour une réapparition par la droite
            if (currentPosition === 0) {
                // Réinitialise sans transition pour une apparition instantanée hors écran
                $(".partners-container .row").css('transition', 'none');
                $(".partners-container .row").css('transform', 'translateX(100%)');
                setTimeout(() => {
                        // Réactive la transition et déplace les images en position de départ
                        $(".partners-container .row").css('transition', 'transform 1s ease-in-out');
                        $(".partners-container .row").css('transform', 'translateX(0)');
                    },
                    20
                ); // Un délai minimal pour s'assurer que la transition est bien désactivée lors de la réinitialisation
            }
        }

        // Commence à afficher chaque vue pendant 5s puis effectue le décalage
        setInterval(showNextView, 6000); // 5s d'affichage + 1s pour la transition
    });
</script>


@endsection()