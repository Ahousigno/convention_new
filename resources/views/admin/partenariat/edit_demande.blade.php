@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Edition de la Demande</h3>
                    </div>
                    <form action="{{route('add_update', $demande_attente->id)}}" id="edit_demande"
                        style="font-size:13px" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <fieldset class="fieldset">

                                <div class="row">
                                    <div class="col-6">
                                        @if ($demande_attente->logo !== null)
                                        <div class="form-group">
                                            <img src="{{asset('/docs/images/lms/'.$demande_attente->logo)}}"
                                                class="img-fluid" style="width:50%" alt="">
                                            @else
                                            <h6><span>Logo : Non renseigné</span></h6>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        @if ($demande_attente->exemple_convention !== null)
                                        <div class="form-group">

                                            <h6>
                                                <a href="{{asset('/docs/images/lms/'.$demande_attente->convention)}}"
                                                    target="_blank"><span>Convention</span>
                                                    <i class="fa fa-download" aria-hidden="true"></i></a>
                                            </h6>
                                            @else
                                            <h6><span>convention : Non renseignée</span></h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <!-- <div class="row">
                                    <div class="col-lg-2 offset-5">
                                        <hr>
                                        <img src="{{asset($demande_attente->logo)}}" class="img-fluid"
                                            style="width:100%" alt="">
                                        <hr>
                                    </div>
                                </div> -->




                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Structure</label>
                                    <input type="text" class="form-control" name="libelle_structure"
                                        value="{{$demande_attente->libelle_structure}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="nom" value="{{$demande_attente->nom}}"
                                        placeholder="Entrer votre Nom">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Prénoms</label>
                                    <input type="text" class="form-control" name="prenoms"
                                        value="{{$demande_attente->prenoms}}" placeholder="Entrer votre Prenom">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Situation Géographique</label>
                                    <input type="text" class="form-control" name="situation_geo"
                                        value="{{$demande_attente->situation_geo}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    <input type="text" class="form-control" name="contact_tel"
                                        value="{{$demande_attente->contact_tel}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{$demande_attente->email}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1">Motif du Partenariat</label>
                                <textarea class="form-control" name="motif" id="exampleFormControlTextarea1"
                                    rows="5">{{$demande_attente->motif}}</textarea>
                            </div>
                        </div>
                        </fieldset>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Opérations</label>
                                    <select class="form-control custom-select" name="can_be_partner">
                                        <option selected value="">---- Selectionnez ---</option>
                                        <option value="OUI">Eligible pour devenir partenaraire a l'UVCI</option>
                                        <option value="NON">Non éligible pour devenir partenaraire a l'UVCI</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $demande_attente->id}}">
                        @include("admin.partenariat.link_drive_modal")

                        <div class="card-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#linkDriveModal"
                                id="#linkDriveModal" data-whatever="@mdo">Enregister</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
$(".fieldset").ready(function() {
    $('.fieldset').prop('disabled', true);
});
</script>
@endsection()