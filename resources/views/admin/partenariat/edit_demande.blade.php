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
                <div class="card" style="font-size:1.3rem; margin-left:15px">
                    <div class="card-header">
                        <h3 class="card-title">Edition de la Demande</h3>
                    </div>
                    <form action="{{route('add_update', $demande_attente->id)}}" id="edit_demande"
                        style="font-size:13px" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" style="font-size:1.3rem; margin-left:15px">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        @if ($demande_attente->logo !== null)
                                        <img src="{{asset('/docs/images/lms/'.$demande_attente->logo)}}"
                                            class="img-fluid" style="width:20%" height="30%" alt="">
                                        @else
                                        <h6><span>Logo : Non renseigné</span></h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        @if ($demande_attente->exemple_convention !== null)
                                        <h6>
                                            <a href="{{asset('/docs/images/lms/'.$demande_attente->exemple_convention)}}"
                                                target="_blank"><span>Convention</span>
                                                <i class="fa fa-download" aria-hidden="true"></i></a>
                                        </h6>
                                        @else
                                        <h6><span>Convention : Non renseignée</span></h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        @if ($demande_attente->regime !== null)
                                        <h6>
                                            <a href="{{asset('/docs/images/lms/'.$demande_attente->regime)}}"
                                                target="_blank"><span>Registre de commerce</span>
                                                <i class="fa fa-download" aria-hidden="true"></i></a>
                                        </h6>
                                        @else
                                        <h6><span>Registre de commerce : Non renseigné</span></h6>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Continent</label>
                                        <input type="text" class="form-control" name="continent"
                                            value="{{$demande_attente->continent}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>pays</label>
                                        <input type="text" class="form-control" name="pays"
                                            value="{{$demande_attente->pays}}" placeholder="">
                                    </div>
                                </div>

                                i <div class="col-4">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input type="text" class="form-control" name="ville"
                                            value="{{$demande_attente->ville}}" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status"
                                            value="{{$demande_attente->status}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>décret</label>
                                        <input type="text" class="form-control" name="decret"
                                            value="{{$demande_attente->decret}}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>site web</label>
                                        <input type="text" class="form-control" name="site"
                                            value="{{$demande_attente->site}}">
                                    </div>
                                </div>
                            </div>

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
                                        <label>Nom du point focal</label>
                                        <input type="text" class="form-control" name="nom"
                                            value="{{$demande_attente->nom}}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Nom du responsable</label>
                                        <input type="text" class="form-control" name="prenoms"
                                            value="{{$demande_attente->prenoms}}">
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

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Eligibilité</label>
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