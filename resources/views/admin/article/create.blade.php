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
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Création d'un Article</h3>
                    </div>

                    <form action="{{$add_update}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data"
                        style="font-size:13px">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$article->name}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Ordre</label>
                                        <input type="text" class="form-control" name="ordre"
                                            value="{{$article->ordre}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Article un Article</label><br>
                                        <textarea class="form-control" id="summary-ckeditor"
                                            name="article">{{$article->article}}</textarea>
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


</section>
@endsection