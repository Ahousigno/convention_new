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
                        <h3 class="card-title">Catégories</h3>
                    </div>


                    <form action="{{ $add_update }}" style="font-size:13px" method="post" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Libelle de la Categorie</label>
                                        <input type="text" class="form-control" name="libelle_categorie"
                                            value="{{$categorie->libelle_categorie}}">
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
</section>
@endsection