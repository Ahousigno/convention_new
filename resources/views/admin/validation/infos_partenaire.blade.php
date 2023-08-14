@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Information du partenariat</div>
                    <div class="card-body">
                        <?php

                        use Carbon\Carbon; ?>

                        <?php $nav = "infos_partenaire" ?>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 class="card-title" style="text-align: center;">Fichiers</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="user-profile">
                                                <h6 class="mb-1" style="font-weight:bold;">Photo de la signature:</h6>
                                                <br>
                                                <img src="{{asset('/docs/images/lms/'.$partenaire->image_convention)}}"
                                                    alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                                            </div>
                                            <br>
                                            <div class="mt-3">
                                                <h6 class="mb-1" style="font-weight:bold;">Logo:</h6>
                                                <br>
                                                <h3 class="d-inline-block">
                                                    <img src="{{asset('/docs/images/lms/'.$demande->where('id' , $partenaire->partenariat_id)->first()->logo)}}"
                                                        alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                                                </h3>
                                            </div>
                                            <br>
                                            <div class="mt-3">
                                                <h6 class="mb-1" style="font-weight:bold;">Convention:</h6>
                                                <br>
                                                <p class="d-inline-block pl-3"> <a
                                                        href="{{asset('/docs/images/lms/'.$partenaire->file_convention)}}"
                                                        target="_blank"><span>Convention</span>
                                                        <i class="fa fa-download" aria-hidden="true"></i></a></p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 class="card-title" style="text-align: center;">Detail</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Nom de la convention:</h6>
                                            <p>{{$partenaire->nom_convention}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Catégorie:</h6>
                                            <p>{{$categorie->where('id' , $partenaire->categorie_id)->first()->libelle_categorie}}<a href="#" class="text-body"></a>
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Contact:</h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->contact_tel}}<a href="#" class="text-body"></a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Date de signature:</h6>
                                            <p> <a href="#" class="text-body">
                                                    {{ Carbon::parse($partenaire->date_debut)->format('d F Y') }}</a>
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Date de fin:</h6>
                                            <p> <a href="#" class="text-body">
                                                    {{ Carbon::parse($partenaire->date_fin)->format('d F Y')}}</a>
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Nom de la structure:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->libelle_structure}}<a href="#" class="text-body"></a>
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Nom du responsable:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->nom}}<a href="#" class="text-body"></a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Nom du point focal:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->prenoms}}<a href="#" class="text-body"></a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Email:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->email}}<a href="#" class="text-body"></a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Situation géographique:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->situation_geo}}<a href="#" class="text-body"></a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1" style="font-weight:bold;">Motif:
                                            </h6>
                                            <p>{{$demande->where('id' , $partenaire->partenariat_id)->first()->motif}}<a href="#" class="text-body"></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endsection