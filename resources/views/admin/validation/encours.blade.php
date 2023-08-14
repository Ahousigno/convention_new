@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->

<?php
$categorie = App\Models\Categorie::first();
?>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des demandes en cours de validation</div>
                    <div class="card-body">

                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Logo</th>
                                        <th>Structure</th>
                                        <th>Status de la demande</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @foreach($partenaires as $partenaire)
                                    <tr style="font-size:13px">
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td style="width:160px"> <img
                                                src="{{asset('/docs/images/lms/'.$partenaire->logo)}}" class="img-fluid"
                                                style="width:20%" alt=""> </td>
                                        <td>{{$partenaire->libelle_structure}}</td>
                                        <td>
                                            <span style="color : blue"><i style="font-size : 18px"
                                                    class="fa fa-cog fa-spin fa-3x fa-fw "></i> validation en
                                                cours...</span>
                                            </a>
                                        </td>
                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">
                                                <a href="#" class="btn btn-success m-1" data-toggle="modal"
                                                    data-target="#valider{{$partenaire->id}}">Valider </a>
                                                {{-- <a href="{{ route('admin.partenaire_form', [$partenaire->uuid , 'close'])}}"
                                                title="ajouter information"><i
                                                    style="font-size : 20px ; margin-right : 5px" class="fa fa-edit"
                                                    aria-hidden="true"> </i> </a>--}}
                                                <form action="{{route('validation_delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="partenariat_id"
                                                        value='{{$partenaire->id}}' />
                                                    <button onclick="return confirm('Voulez-vous vraiment Supprimer ?')"
                                                        style="margin-left:10px; border:0px" name="submit">
                                                        <i style="color:red" class=" fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="valider{{$partenaire->id}}"
                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{route('validation_partner', [$partenaire->id])}}"
                                                    method="post" enctype='multipart/form-data'>
                                                    @csrf
                                                    <input type="hidden" name="partenariat_id"
                                                        value="{{$partenaire->id}}">
                                                    <div class="container mb-5">
                                                        <h2 class="text-center">
                                                            <img src="{{asset($partenaire->logo)}}" class="img-fluid"
                                                                style="width:20%" alt="">
                                                        </h2>
                                                        <h2 class="text-center">{{$partenaire->libelle_structure}}</h2>
                                                    </div>
                                                    <div class="row col-lg-12">
                                                        <div class="form-group col-sm-6">
                                                            <label for="">Nom de la convention</label>
                                                            <input type="text" name="nom_convention" id=""
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="">Catégorie de la convention</label>
                                                            <select class="form-control custom-select" required
                                                                name="categorie_id">
                                                                <option selected value="" name="categorie_id">----
                                                                    Selectionnez ---</option>
                                                                @foreach($categories as $categorie)
                                                                <option
                                                                    {{ ($categorie->id == $partenaire->categorie_id) ? 'selected' : '' }}
                                                                    value="{{$categorie->id}}">
                                                                    {{$categorie->libelle_categorie}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="row col-lg-12">
                                                            <div class="form-group col-sm-6">
                                                                <label for="">date de debut</label>
                                                                <input type="date" name="date_debut" id=""
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="">date de fin</label>
                                                                <input type="date" name="date_fin" id=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row col-lg-12">
                                                            <div class="form-group col-sm-6">
                                                                <label for="">Chargez la convention signée</label>
                                                                <input type="file" name="file_convention" id=""
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="">Chargez une image de la signature</label>
                                                                <input type="file" name="image_convention" id=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary">Valider</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fermer</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(!is_object($partenaires[0]))
                                    <tr>
                                        <td colspan="7">AUCUNE INFORMATION DISPONIBLE</td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
$("select[name='sous_type_recru']").change(function() {
    var sous_type_recru = $(this).val();
    var type_recru = $("input[name='type_recru_id']").val()
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "",
        method: 'POST',
        data: {
            sous_type_recru: sous_type_recru,
            type_recru: type_recru,
            _token: token
        },
        success: function(data) {
            $("#content").html('');
            $("#content").html(data.response);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});
</script>
@endsection