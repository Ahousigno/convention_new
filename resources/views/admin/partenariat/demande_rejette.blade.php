@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des demandes Rejétes</div>
                    <div class="card-body">

                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Logo</th>
                                        <th>Structure</th>
                                        <th>Nom</th>
                                        <th>Contact</th>
                                        <th>E-Mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @forelse($rejetes as $i => $rejete)
                                    <tr style="font-size:13px">
                                        <td>{{$i}}</td>
                                        <td style="width:160px"> <img src="{{asset($rejete->logo)}}" class="img-fluid" style="width:20%" alt=""> </td>
                                        <td>{{$rejete->structure}}</td>
                                        <td>{{$rejete->nom}}</td>
                                        <td>{{$rejete->contact}}</td>
                                        <td>{{$rejete->email}}</td>
                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">
                                                <form action="{{ Route('demand_refresh') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $rejete->id }}">
                                                    <button title="retablir la demande"><i class="fa fa-refresh" alt aria-hidden="true"> </i></button>
                                                </form>
                                                <form action="{{route('admin.demande_rejete_delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value='{{$rejete->id}}' />
                                                    <button onclick="return confirm('Voulez-vous vraiment Supprimer ?')" style="margin-left:10px; border:0px" type="submit" name="submit">
                                                        <i style="color:red" class=" fa fa-trash">
                                                        </i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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