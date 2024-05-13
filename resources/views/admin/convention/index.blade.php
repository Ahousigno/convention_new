@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php

            use Carbon\Carbon; ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des demandes de convention</div>
                    <div class="card-body">

                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Nom du demandeur</th>
                                        <th>E-Mail</th>
                                        <th>Contact</th>
                                        <th>Objet</th>
                                        <th>Convention demandée</th>
                                        <th>Date de demande</th>
                                        <th>Action</th>
                                        <th>Statut</th>

                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @forelse($demande_conventions as $convention)
                                    <tr style="font-size:13px">
                                        <td>{{$convention->nom}}</td>
                                        <td>{{$convention->emailuvci}}</td>
                                        <td>{{$convention->contact}}</td>
                                        <td>{{$convention->objet}}</td>
                                        <td>{{$convention->convention}}</td>
                                        <td>{{ Carbon::parse($convention->created_at)->format('d-m-Y H:i:s')}}</td>

                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">
                                                @if($convention->status == 'validé')
                                                @elseif($convention->status == 'refusé')
                                                @else
                                                <a href="#" class="btn btn-success m-1" data-toggle="modal" data-target="#valider{{$convention->id}}">Valider </a>
                                                <a href="#" class="btn btn-danger m-1" data-toggle="modal" data-target="#refuser{{$convention->id}}">Rejeter </a>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            @if($convention->status == 'validé')
                                            <h6><span class="badge badge-success">{{$convention->status}}</span></h6>
                                            @elseif($convention->status == 'refusé')
                                            <h6><span class="badge badge-danger">{{$convention->status}}</span></h6>
                                            @else
                                            <h6><span class="badge badge-warning">{{$convention->status}}</span></h6>
                                            @endif
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-sm" id="valider{{$convention->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <form action="{{route('conventions.valider', $convention->id)}}" method="post">
                                                    @csrf
                                                    <div class="modal-footer">
                                                        <h5>Voulez vous vraiment valider cette convention ?</h5>
                                                        <button type="submit" class="btn btn-success">Valider</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade bd-example-modal-lg" id="refuser{{$convention->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{route('conventions.refuser', $convention->id)}}" method="post">
                                                    @csrf
                                                    <div class="form-group col-sm-12">
                                                        <label for="">Motif de rejet</label>
                                                        <textarea name="motif" id="" cols="30" rows="6" class="form-control" required></textarea>
                                                        @if ($errors->has('motif'))
                                                        <span class="text-danger fst-italic">
                                                            {{ $errors->first('motif') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Réfuser</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr>
                                        <td colspan="7">AUCUNE INFORMATION DISPONIBLE</td>
                                    </tr>
                                    @endforelse
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