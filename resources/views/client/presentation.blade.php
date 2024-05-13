@extends('layouts.client_layout')
@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
@endsection
@section('contenu')
<!-- Banner start -->

<?php $nav = "presentation" ?>
<!-- Destinations -->
<div class="container mt-5 mb-5" style="box-shadow: inset 0 0 0.5em blue;">
    <section class="our-webcoderskull padding-lg">
        <div class="container pt-3">
            <a href="http://event.uvci.edu.ci/" class="blink" target="_blank">Plateforme Event</a>
            <div class="row">
                <h2 class="text-center mt-4 mb-5" style="color: #92278f; font-weight: bold">
                    Service Juridique, Communication et Partenariats
                </h2>
                <h4 class="text-center mb-4">
                    Le Service Juridique, Communication et Partenariats a pour missions de :
                </h4>
            </div>
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo-juridique.png')}}" class="img-responsive" alt=""></figure>
                        <p>Apporter une assistance juridique aux différents services de l’UVCI.<br></p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo_assist2.jpg')}}" class="img-responsive" alt=""></figure>
                        <p>Assister et conseiller les responsables en matière d’élaboration ou d’interprétation.</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/decision.png')}}" class="img-responsive" alt=""></figure>
                        <p>Aider à la prise de décision.</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/veille_juridique.png')}}" class="img-responsive" alt=""></figure>
                        <p>Assurer la veille juridique.</p>
                    </div>
                </li>
            </ul>
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo-juridique.png')}}" class="img-responsive" alt=""></figure>
                        <p>Veiller à la régularité juridique des actions à entreprendre.</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo_contrat.jpg')}}" class="img-responsive" alt=""></figure>
                        <p>Protéger les intérêts del’UVCI et participer à la rédaction des contrats.</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo_event.jpg')}}" class="img-responsive" alt=""></figure>
                        <p>Organiser les évènements.</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 250px;" id="presentation">
                        <figure><img src="{{asset('client/assets/img/missions/logo_assist2.jpg')}}" class="img-responsive" alt=""></figure>
                        <p>Porter assistance aux clients.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>

<style>
    .blink {
        animation: blinker 2s linear infinite;
        background-color: rgb(18, 166, 80);
        color: white;
        padding: 10px;
        border-radius: 12px;
        font-weight: bold;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    a:hover {
        text-decoration: none;
        color: white;
    }
</style>
@endsection()