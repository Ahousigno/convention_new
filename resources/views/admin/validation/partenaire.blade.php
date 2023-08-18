@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->

        <?php

        use Carbon\Carbon;

        function dateFinPartenariat($date)
        {
            $date = Carbon::parse($date);
            $currentDate = Carbon::now();
            $monthsUntilEndPartenariat = $currentDate->diffInMonths($date, false);
            if ($monthsUntilEndPartenariat <= 3) {
                if ($monthsUntilEndPartenariat == 0) {
                    $monthsUntilEndPartenariat = "ce";
                }
                return  $monthsUntilEndPartenariat;
            }
            return $monthsUntilEndPartenariat;
        }

        ?>
        <div class="alert alert-info">
            @foreach($partenariats as $k => $partenariat)
            @if(dateFinPartenariat($partenariat->date_fin))
            {{
                    "le partenariat avec la structure " . $demande->where('id' , $partenariat->partenariat_id)->first()->libelle_structure . 
                    " se termine dans " . dateFinPartenariat($partenariat->date_fin) . " mois , date de fin de partenariat : " .  $partenariat->date_fin
                    }}
            <br>
            @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des Partenaires</div>
                    <div class="card-body">
                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Logo</th>
                                        <th>Structure</th>
                                        <th>Date de signature</th>
                                        <th>Date de fin</th>
                                        <th>Action</th>
                                        <th>Imprimer la Convention</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @foreach($partenariats as $k => $partenariat)
                                    <th scope="row">{{$k + 1}}</th>
                                    <td style="width:140px"> <img src="{{asset('/docs/images/lms/'. $demande->where('id' , $partenariat->partenariat_id)->first()->logo)}}" class="img-fluid" style="width:20%" alt=""> </td>

                                    <td style="width:140px">
                                        {{$demande->where('id' , $partenariat->partenariat_id)->first()->libelle_structure}}
                                    </td>
                                    <td style="width:140px"> {{$partenariat->date_debut}}
                                    </td>
                                    <td style="width:140px">{{$partenariat->date_fin}}
                                    </td>
                                    <td>
                                        <div style=" display:flex; flex-flow:row nowrap">

                                            <a href="{{ route('admin.validation.infos_partenaire' , ['id' => $partenariat->id] ) }}">
                                                infos <i style="color:blue; font-size:10px" class=" fa fa-plus">
                                                </i>
                                            </a>

                                        </div>
                                    </td>
                                    <td>
                                        <a target="_blank" title="Imprimer la Convention" style="padding-left:30px" href="{{asset('/docs/images/lms/'. $partenariat->file_convention)}}" target="_blank"><span>Convention</span>
                                            <i class="fa fa-download" aria-hidden="true">
                                            </i>

                                        </a>
                                    </td>
                                    </tr>
                                    @endforeach
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