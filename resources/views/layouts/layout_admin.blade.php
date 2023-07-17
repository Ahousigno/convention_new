<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SYSTEME DE GESTION DES CONVENTIONS DE L'UVCI</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/admin/dist/css/adminlte.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/admin/plugins/select2/css/select2.css')}}">

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav style="background:#951b81" class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color:#fff" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a style="color:#fff" href="" class="nav-link">dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a style="color:#fff" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Deconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item d-none d-sm-inline-block"><a style="color:#fff" class="nav-link"> |
                        {{ Auth::user()->name }}</a></li>
                <li class="nav-item d-none d-sm-inline-block"><a style="color:#fff" class="nav-link"> |
                        {{ Auth::user()->email }}</a></li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a style="background:#139c40" href="{{route('client.accueil')}}" class="brand-link">
                <img src="{{ asset('template/admin/dist/img/logo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .3">
                <span class="brand-text font-weight-light">SGC - UVCI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('template/admin/dist/img/logo.png')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">SGRH-UVCI</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-header">PARTENARIATS</li>
                        <li class="nav-item">
                            <a href="{{route('admin.partenariat.demande_attente')}}" class="nav-link">
                                <i style="font-size:15px" class="fa fa-clock-o"></i>
                                <p>Demandes en Attentes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.validation.encours')}}" class="nav-link">
                                <i style="font-size:15px" class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                                <p>Validation en cours..</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="font-size:15px" class="fa fa-times"></i>
                                <p>Demande Réjétée</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.categorie.create')}}" class="nav-link">
                                <i style="font-size:15px" class="fa fa-hashtag"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{route('admin.validation.partenaire')}}" class="nav-link"><i
                                    style="font-size:13px" class="fa fa-users nav-icon"></i>
                                <p>Partenaires</p>
                            </a></li>
                        <li class="nav-item"><a href="{{route('admin.article.base')}}" class="nav-link"><i
                                    style="font-size:13px" class="fa fa-book nav-icon"></i>
                                <p>Articles de Bases</p>
                            </a></li>

                        <li class="nav-item">
                            <a href="{{route('show_demande_convention')}}" class="nav-link">
                                <i style="font-size:15px" class="fa fa-hashtag"></i>
                                <p>Convention</p>
                            </a>
                        </li>
                        {{--@if(Auth::user()->hasrole('superadmin'))

                            <li class="nav-header">ADMINISTRATION</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i style="font-size:13px" class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Droits
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($laravelAdminMenus->menus as $section)
                                @if($section->items)
                                {{ $section->section }}
                        @foreach($section->items as $menu)
                        <li class="nav-item"><a href="{{ url($menu->url) }}" class="nav-link"><i style="font-size:13px"
                                    class="far fa-circle nav-icon"></i>
                                <p>{{ $menu->title }}</p>
                            </a></li>
                        @endforeach
                        @endif
                        @endforeach
                    </ul>
                    </li>


                    @endif--}}

                    <br><br>




                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-7">
                            <h5 class="text-dark">SYSTEME DE GESTION DES CONVENTIONS DE L'UVCI</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <button class="btn btn-outline-danger btn-sm" onclick="goBack()">
                                    <i class="fa fa-arrow-left" aria-hidden="true"> retour</i>
                                </button>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div><br>

           <div class="container">
                
                @if(session('success'))
                    <div class="alert alert-success">
                         {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                    {{session('error')}}
                    </div>
                @endif

            </div>
            <br>
            @yield('content')
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer style="background:#951b81; color:#fff; height:50px" class="main-footer">
                <div class="col-xs-12">
                    <div style="text-align:center" class="copyright-content">
                        <p>Copyright © 2020 -- UVCI tous droits réservés. <i class="fa fa-copyright"
                                aria-hidden="true"></i>
                            | (225) 42 22 22 11 | (225) 72 51 30 32 | <a
                                href="courrier@uvci.edu.ci">courrier@uvci.edu.ci</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}">
        </script>
        <!-- AdminLTE App -->
        <script src="{{asset('template/admin/dist/js/adminlte.js')}}"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{asset('template/admin/dist/js/demo.js')}}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{asset('template/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}">
        </script>
        <script src="{{asset('template/admin/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('template/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
        <script src="{{asset('template/admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('template/admin/plugins/chart.js')}}/Chart.min.js')}}"></script>

        <!-- PAGE SCRIPTS -->
        <script src="{{asset('template/admin/dist/js/pages/dashboard2.js')}}"></script>


        <!-- Scripts DataTable -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('datatable/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('datatable/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
        <!-- This is data table -->
        <script src="{{ asset('datatable/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('datatable/datatables.net-bs4/js/dataTables.responsive.min.js') }}">
        </script>
        <script !src="">
        // responsive table
        $('#config-table').DataTable({
            'responsive': true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });

        // responsive table
        $('#config-table_pers').DataTable({
            'responsive': true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
        </script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Fin Scripts DataTable -->

        <!--fileinput-->
        <script>
        // with plugin options
        $("#test-upload").fileinput({
            dropZoneEnabled: true,
            showUpload: false,
            overwriteInitial: false,
        });
        </script>
        <!--fileinput fin-->

        <script>
        function goBack() {
            window.history.back();
        }
        </script>
        <script src="{{asset('template/admin/plugins/select2/js/select2.full.min.js')}}"></script>

        <script>
        $(function() {
            $('.select2_perso').select2()
        })
        </script>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
        CKEDITOR.replace('summary-ckeditor');
        </script>

        @yield('js')
</body>

</html>