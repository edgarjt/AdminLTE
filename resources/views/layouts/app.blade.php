<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cruz Roja Tab</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logo1.ico')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    {{--Data table--}}
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini fixed">

<div class="wrapper">
    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('home')}}" class="logo">
            <div style="background: white" class="logo-lg">
                <img src="{{asset('img/logo0.png')}}" alt="Logo" width="45%">
            </div>
            <span class="logo-mini"><b>CRZ</b>R</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>

    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('img/profile.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>user@email.com</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <li>
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> <span> Inicio</span></a>
                </li>

                {{--Bitacora--}}
                <li class="treeview">
                    <a href="#"><i class="fa fa-clipboard"></i> <span> Bitácora</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('bitacora')}}"><i class="fa fa-circle-o"></i>Registros</a></li>
                    </ul>
                </li>

                {{--Graficas--}}
                <li class="treeview">
                    <a href="#"><i class="fa fa-pie-chart"></i> <span> Gráficas</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('all')}}"><i class="fa fa-circle-o"></i>General</a></li>
                        <li><a href="{{route('day')}}"><i class="fa fa-circle-o"></i>Dias</a></li>
                        <li><a href="{{route('month')}}"><i class="fa fa-circle-o"></i>Mes</a></li>
                        <li><a href="{{route('year')}}"><i class="fa fa-circle-o"></i>Año</a></li>
                        <li><a href="{{route('reports')}}"><i class="fa fa-circle-o"></i>Reportes</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <main>
                @yield('content')
            </main>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            {{--lorem ipsum--}}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{\Carbon\Carbon::now()->format('Y')}} Cruz Roja Mexicana en Tabasco.</strong>
    </footer>
</div>

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/global.js')}}"></script>
<script src="{{asset('js/graficas.js')}}"></script>
<script src="{{asset('js/resources.js')}}"></script>

</body>
</html>
