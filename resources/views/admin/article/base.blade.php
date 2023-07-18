@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">Liste des Articles</div>
                    <div class="card-body">
                        <a href="{{route('admin.article.add')}}" class="btn btn-success btn-sm" title="Add New Group">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter
                        </a>
                        <br /><br />
                        <div class="table-responsive">
                            <table id="config-table" class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>name</th>
                                        <th>ordre</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @forelse($articles as $i => $article)
                                    <tr style="font-size:13px">
                                        <td>{{$i+1}}</td>
                                        <td>{{$article->name}}</td>
                                        <td>article {{$article->ordre}}</td>

                                        <td>
                                            <div style="display:flex; flex-flow:row nowrap">

                                                <a href="{{route('admin.article.edit', $article->id)}}" title="Editer"><i class="fa fa-edit" aria-hidden="true"> </i> </a>

                                                <form style="padding-bottom:10px;" action="{{route('admin.article_delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value='{{$article->id}}' />
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
                                        <td colspan="4">AUCUNE INFORMATION DISPONIBLE</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
</section>
@endsection