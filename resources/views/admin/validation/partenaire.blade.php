@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
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
                                        <th>Imprimer la Convention</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @foreach($partenariats as $k => $partenariat)

                                    <th scope="row">{{$k + 1}}</th>
                                    <td style="width:140px"> <img
                                            src="{{asset('/docs/images/lms/'. $demande->where('id' , $partenariat->partenariat_id)->first()->logo)}}"
                                            class="img-fluid" style="width:20%" alt=""> </td>

                                    <td style="width:140px">
                                        {{$demande->where('id' , $partenariat->partenariat_id)->first()->libelle_structure}}
                                    </td>
                                    <td style="width:140px">
                                        {{ Carbon::parse($partenariat->date_debut)->format('d-m-Y')}}</a>

                                    </td>
                                    <td style="width:140px">
                                        {{ Carbon::parse($partenariat->date_fin)->format('d-m-Y')}}</a>
                                    </td>

                                    <td>
                                        <a target="_blank" title="Imprimer la Convention" style="padding-left:30px"
                                            href="{{asset('/docs/images/lms/'. $partenariat->file_convention)}}"
                                            target="_blank"><span>Convention</span>
                                            <i class="fa fa-download" aria-hidden="true">
                                            </i>

                                        </a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div style=" display:flex; flex-flow:row nowrap">
                                                    <a
                                                        href="{{ route('admin.validation.infos_partenaire' , ['id' => $partenariat->id] ) }}">
                                                        infos <i style="color:blue; font-size:10px" class=" fa fa-plus">
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div style=" display:flex; flex-flow:row nowrap">
                                                    <button type="button" class="btn btn-primary btn-lg"
                                                        data-toggle="modal"
                                                        data-target="#gridModal{{$partenariat->id}}">
                                                        Activité
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="7">A-UCUNE INFORMATION DISPONIBLE</td>
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
<!-- The modal -->

<!-- end  modal -->

@foreach($partenariats as $partenariat)
@include('admin.validation.activite-modal' , compact('partenariat'))

@endforeach @endsection
<!-- jQuery library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function() {
    $('[data-toggle="popover"]').popover()
})
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->