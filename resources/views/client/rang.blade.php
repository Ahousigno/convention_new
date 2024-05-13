@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section("contenu")
<?php

use Carbon\Carbon;

$nav = "rang" ?>
<style>
.card {
    box - shadow: 0 4 px 8 px rgba(0, 0, 0, 0.1);
    margin: 20 px;
    border - radius: 5 px;
}

.card - header {
    background - color: #92278f;
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
    background-color: # 007 bff;
    color: white;
    padding: 10 px 20 px;
    text - decoration: none;
    border: none;
    border - radius: 5 px;
    cursor: pointer;
}

/* Adaptations spécifiques pour aligner les boutons sans utiliser le style en ligne */
.col - sm - 4: nth - child(1).btn - primary {
    align - self: flex - start;
}

.col - sm - 4: nth - child(3).btn - primary {
    align - self: flex - end;
}
</style>



<?php
$partenaireWithMaxActivites = $partenaires->filter(function ($partenaire) {
    return $partenaire->activites->count() >= 5;
})->sortByDesc(function ($partenaire) {
    return $partenaire->activites->count();
})->first();

$partenaireWithMoyenActivites = $partenaires->filter(function ($partenaire) {
    return $partenaire->activites->count() < 5 && $partenaire->activites->count() >= 3;
})->sortByDesc(function ($partenaire) {
    return $partenaire->activites->count();
})->first();

$partenaireWithLowActivites = $partenaires->filter(function ($partenaire) {
    return $partenaire->activites->count() < 3;
})->sortByDesc(function ($partenaire) {
    return $partenaire->activites->count();
})->first();
?>


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
                                @if(!is_null($partenaireWithMaxActivites->image_convention))
                                <img src="{{asset('/docs/images/lms/'. $partenaireWithMaxActivites->image_convention)}}"
                                    alt="image" width="150px" height="150px">
                                @endif
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
                                <img src="{{asset('/docs/images/lms/'. $partenaireWithMoyenActivites->image_convention)}}"
                                    alt="image" width="150px" height="150px">
                            </div>
                            <div>

                                <a href="{{route('client.dynamique')}}" class="btn btn-primary">
                                    Voir Plus</a>
                            </div>
                        </div>
                        <div class="col-sm-4" style="min-height:150px">
                            <h3>Partenaires moins dynamiques</h3>
                            <div class="media-item">
                                <img src="{{asset('/docs/images/lms/'. $partenaireWithLowActivites->image_convention)}}"
                                    alt="image" width="150px" height="150px">
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
@endsection