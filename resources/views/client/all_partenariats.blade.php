@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php $nav = "accueil" ?>
<?php $partenaire = App\Models\Validation::first(); ?>
<section class="partners mt-5">
    <h2 class="part">Nos partenaires</h2>
    <div class="partners-container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('/docs/images/lms/'.$partenaire->image_convention)}}" width="30%"
                            alt="Description de l'image 1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection()