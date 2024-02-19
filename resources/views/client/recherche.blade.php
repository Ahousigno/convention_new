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
                <div class="row">

                    <div class="col-sm-4">
                        <h3 style="width:100px ; height:40px ;text-align:center; margin-bottom:50px">conventions
                            très
                            dynamiques</h3>
                        <div class=" media-item">
                            <img src="{{asset('/docs/images/lms/'. $partnerWithMaxActivites->image_convention)}}"
                                alt="image" width="50%">
                        </div>
                        <br>

                        <div>
                            <a href="{{route('client.tres_dynamique')}}" class="btn btn-primary"
                                style=" color: white; text-decoration: none; width:100px;height:40px; text-align:center; margin-left:25px">
                                Voir
                                Plus</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3 style="width:100px ; height:40px ;text-align:center; margin-bottom:50px">conventions
                            dynamiques</h3>
                        <div class="media-item">
                            <img src="{{asset('/docs/images/lms/'. $partnerWithMoyenActivites->image_convention)}}"
                                alt="image" width="50%">
                        </div>
                        <br>
                        <a href="{{route('client.dynamique')}}" class="btn btn-primary"
                            style=" color: white; text-decoration: none; width:100px;height:40px; margin-left:15px">
                            Voir
                            Plus</a>
                    </div>
                    <div class="col-sm-4">
                        <h3 style="width:100px ; height:40px ;text-align:center; margin-bottom:50px">conventions
                            moins
                            dynamiques</h3>
                        <div class="media-item">
                            <img src="{{asset('/docs/images/lms/'. $partnerWithLowActivites->image_convention)}}"
                                alt="image" width="50%">
                        </div>
                        <br>
                        <a href="{{route('client.moins_dynamique')}}" class="btn btn-primary"
                            style=" color: white; text-decoration: none; width:100px;height:40px; margin-left:10px">
                            Voir
                            Plus</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="sidebar-sticky" class="col-md-4">
        <aside class="detail-sidebar sidebar-wrapper">
            <div class="sidebar-item sidebar-item-dark">
                <div class="detail-title">
                    <h3>Recherche</h3>
                </div>
                <form action="{{route('client.recherche')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="text" class="form-control" name='mot' id="Name"
                                placeholder="Que desirez-vous ?">
                        </div>
                        <div class="col-xs-12">
                            <div class="comment-btn">
                                <input class="btn-blue btn-red" style="background-color: #92278f;" type="submit"
                                    value="Recherche">
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

            <div class="sidebar-item">
                <div class="detail-title">
                    <h4>Catégories</h4>
                </div>
                <div class="sidebar-content">
                    <form>
                        @foreach($categories as $categorie)
                        <input class="categorie" type="checkbox" name="categorie[]" value="{{$categorie->id}}">
                        {{$categorie->libelle_categorie}}<br>
                        @endforeach
                    </form>
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
        <h3>RESULTATS DE LA RECHERCHE</h3>
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
                                            <img src="{{asset('docs/images/lms/'.$search->logo)}}" style="width:70%"
                                                alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="destination-fw-desc fw-content">
                                            <h3><a
                                                    href="{{route('client.info', $search->id)}}">{{$search->libelle_structure}}</a>
                                            </h3>
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-btns">
                                            <div class="destination-btns">
                                                <a href="{{route('client.info', $search->id)}}" class="btn-blue btn-red"
                                                    tabindex="0">Voir Plus</a>
                                            </div>
                                        </div>
                                        <div style="padding-top:20px" class="destination-fw-content">
                                            <p class="fw-info"> Date de Signature:<br> <i class="fa fa-clock-o"
                                                    aria-hidden="true"> </i>
                                                {{ \Carbon\Carbon::parse($search->created_at)->format('d-m-Y') }}
                                            </p>
                                            <hr>
                                            <p class="fw-info"> Date de fin:<br> <i class="fa fa-clock-o"
                                                    aria-hidden="true"> </i>
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
</style>

@endsection()