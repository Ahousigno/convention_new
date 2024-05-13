@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php $nav = "accueil" ?>

<section class="partners mt-12">
    <h2 class="part">Nos partenaires</h2>
    <div class="partners-container">
        <div class="col-lg-12">
            <div class="row">
                @foreach($partenariats as $partenariat)
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('/docs/images/lms/'. $partenariat->demande->logo)}}"
                            alt="Description de l'image" width="50%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>




@endsection()