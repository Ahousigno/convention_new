@extends('layouts.layout_admin')

@section('content')
<!-- Main content http://localhost/projetdrhmesrs/public/api/get_contractuel/8  -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box" style="cursor : pointer" onclick="window.location.href='<?php $link = Route(strtolower('admin.partenariat.demande_attente'));
                                                                                                echo $link ?>'">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-tasks"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Demande de Partenariats</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-4" style="cursor : pointer" onclick="window.location.href='#'">
                    <span class="info-box-icon bg-warning elevation-1"><i style="font-size:25px" class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Validation de demande acceptée</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-4" style="cursor : pointer" onclick="window.location.href='#'">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-times" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Demande patenariats rejétées</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->

                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-4" style="cursor : pointer" onclick="window.location.href='#'">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Categories de Partenariats</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-4" style="cursor : pointer" onclick="window.location.href='">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Nos partenaires</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-4" style="cursor : pointer" onclick="window.location.href='#'">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-book" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Article de bases</span>
                        <span class="info-box-number">
                            {{--{{$demand_attentes->count()}}--}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

    </div>
    <!--/. container-fluid -->
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script type="text/javascript">
    $(".fieldset").ready(function() {
        $('.fieldset').prop('disabled', true);
    });
</script>
@endsection()