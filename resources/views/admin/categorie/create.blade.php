@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <a href="#" class="btn btn-success btn-icon" data-bs-toggle="modal" data-bs-target="#categorie" data-placement=" top" title="" data-original-title="">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter
                        </a>
                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Libelle de la Categorie</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @forelse($categories as $categorie)
                                    <tr style="font-size:13px">
                                        <td>{{$i++}}</td>
                                        <td>{{$categorie->libelle_categorie}}</td>

                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">
                                                <a href="{{route('admin.categorie.edit', $categorie->id)}}" title="Editer"><i class="fa fa-edit" aria-hidden="true"> </i> </a>
                                                <form style="padding-bottom:10px;" action="{{route('admin.categorie_delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value='{{$categorie->id}}' />
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
                                        <td colspan="3">AUCUNE INFORMATION DISPONIBLE</td>
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



{{--Modal de categorie--}}
<div class="row">
    <div class="modal fade" id="categorie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Info boxes -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Catégories</h3>
                            </div>

                            <form action="{{route('categorie_save')}}" style="font-size:13px" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Libelle de la Categorie</label>
                                                <input type="text" class="form-control" name="libelle_categorie" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Enregister</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection