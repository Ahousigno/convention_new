@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des Partenaires</div>
                    <div class="card-body">
                        <?php
                        $partenariat = App\Models\Demandepartenariat::first();
                        ?>
                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Logo</th>
                                        <th>Structure</th>
                                        <th>Action</th>
                                        <th>Imprimer la Convention</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>

                                    <tr style="font-size:13px">
                                        <td></td>
                                        <td style="width:160px"> <img
                                                src="{{asset('/docs/images/lms/'.$partenariat->logo)}}"
                                                class="img-fluid" style="width:20%" alt=""> </td>
                                        <td>{{$partenariat->libelle_structure}}</td>

                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">

                                                <a href="{{route('admin.validation.infos_partenaire')}}">
                                                    en savoir plus <i style="color:blue; font-size:10px"
                                                        class=" fa fa-plus">
                                                    </i>
                                                </a>

                                            </div>
                                        </td>
                                        <td>
                                            <a target="_blank" title="Imprimer la Convention" style="padding-left:30px"
                                                href="">
                                                convention
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="7">AUCUNE INFORMATION DISPONIBLE</td>
                                    </tr>

                                </tbody>
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