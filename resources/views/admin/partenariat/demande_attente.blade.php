@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Liste des demandes en attentes</div>
                    <div class="card-body">

                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Logo</th>
                                        <th>Structure</th>
                                        <th>Nom et prénoms du point focal</th>
                                        <th>Nom et prénoms du responsable</th>
                                        <th>Contact</th>
                                        <th>E-Mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @forelse($partenariats as $partenariat)
                                    <tr style="font-size:13px">
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td style="width:160px"> <img src="{{asset($partenariat->logo)}}" class="img-fluid" style="width:20%" alt=""> </td>
                                        <td>{{$partenariat->libelle_structure}}</td>
                                        <td>{{$partenariat->nom}}</td>
                                        <td>{{$partenariat->prenoms}}</td>
                                        <td>{{$partenariat->contact_tel}}</td>
                                        <td>{{$partenariat->email}}</td>

                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">
                                                <a href="{{route('admin.edit_demande', $partenariat->id)}}" title="Editer le profile"><i class="fa fa-edit" aria-hidden="true">
                                                    </i> </a>

                                                <form action="{{route('admin.demande_attentes_delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value='{{$partenariat->id}}' />
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
                            <div class="mt-3">

                            </div>
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