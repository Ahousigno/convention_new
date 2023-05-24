@extends("layouts.client_layout")

@section('section_css')

@endsection

@section("contenu")
    <?php $nav = "mediatheque" ?>
    <div class="container mt-5">
        <h2 class="mb-4">La liste de tous les partenariats</h2>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Description de l'image 1">
                        <div class="media-details">
                            <p>Date de signature : 01/01/2022</p>
                            <p>Date de fin de partenariat : 01/01/2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Description de l'image 1">
                        <div class="media-details">
                            <p>Date de signature : 01/01/2022</p>
                            <p>Date de fin de partenariat : 01/01/2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Description de l'image 1">
                        <div class="media-details">
                            <p>Date de signature : 01/01/2022</p>
                            <p>Date de fin de partenariat : 01/01/2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="media-item">
                        <img src="{{asset('client/assets/img/missions/tresor.jpg')}}" alt="Description de l'image 1">
                        <div class="media-details">
                            <p>Date de signature : 01/01/2022</p>
                            <p>Date de fin de partenariat : 01/01/2023</p>
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
