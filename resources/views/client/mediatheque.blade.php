@extends("layouts.client_layout")

@section('section_css')

@endsection

@section("contenu")
<?php $nav = "mediatheque" ?>
<?php

use Carbon\Carbon; ?>

<?php
$partenaire = App\Models\Validation::first();
?>


<div class="container mt-5">
    <h2 class="mb-4">La liste de tous les partenariats</h2>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="media-item">
                    <img src="{{asset('/docs/images/lms/'.$partenaire->image_convention)}}" alt="Description de l'image 1">
                    <div class="media-details">
                        <p>Convention: {{$partenaire->nom_convention}}</p>Date de signature :
                        {{ Carbon::parse($partenaire->date_debut)->format('d F Y') }}</p>
                        <p>Date de fin: {{ Carbon::parse($partenaire->date_fin)->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .media-item {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .media-item img {
        width: 100%;
        height: auto;
    }

    .media-details {
        margin-top: 10px;
    }
</style>
@endsection()