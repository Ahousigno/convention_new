@extends("layouts.client_layout")

@section('section_css')
<link rel="stylesheet" href="{{asset('client/assets/css/presentation.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/partenariat.css')}}">
@endsection

@section("contenu")
<?php $nav = "moins_dynamique";
use Carbon\Carbon; ?>


<div class="container mt-5">
    <div class="row">
        <h4 class="archive-title">Partenaires moins dynamiques</h4>
        <hr>
        @foreach($partenaireWithLowActivites as $partenaireWithLowActivite)
        <div class="col-lg-6 mb-2">
            <div class="card">
                <img src="{{asset('/docs/images/lms/'. $partenaireWithLowActivite->image_convention)}}" width="450"
                    height="300" class="card-img-bottom" alt="" />
                <div class="card-body">
                    <div class="row">
                        <div class="card-title col-6">Nom{{$partenaireWithLowActivite->nom_convention}}: <span></span>
                        </div>
                        <div class="card-title col-6">Signé le:
                            {{ Carbon::parse($partenaireWithLowActivite->date_debut)->format('d-m-Y')}}<span></span>
                        </div>

                    </div>
                </div>
                <a class="btn" style="background-color: #92278f;width: 100%;height: 40px;color: white;border: none"
                    href="{{route('client.info' , $partenaireWithLowActivite->id )}}"> Voir plus</a>
            </div>
        </div>

        @endforeach

    </div>
</div>




@endsection()