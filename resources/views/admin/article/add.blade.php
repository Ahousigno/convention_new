@extends('layouts.layout_admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Edition de l'Article</h3>
                    </div>

                    <form action="{{route('article_save')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data" style="font-size:13px">
                        <input type="hidden" name="_token" value="">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Ordre</label>
                                        <input type="text" class="form-control" name="ordre" value="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Article un Article</label><br>
                                        <textarea class="form-control" id="summary-ckeditor" name="article"></textarea>
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
<!-- /.content-wrapper -->
@endsection