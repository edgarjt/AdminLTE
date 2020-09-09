<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cruz Roja Tab</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logo1.ico')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
{{--    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    {{--Data table--}}
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @if(Auth::User()->role == 0)
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>

                            <span class="label label-warning">
                                {{\App\User::where('notification', 1)->count()}}
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Tienes {{\App\User::where('notification', 1)->count()}}  nueva notificacines</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        @foreach(\App\User::where('notification', 1)->orderBy('id', 'desc')->get() as $item)
                                            <a href="{{url('edit/'.$item->id)}}">
                                                <i class="fa fa-users text-aqua"></i>
                                                {{$item->name}} {{$item->surname}}
                                                se registro.
                                            </a>
                                        @endforeach
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(Auth::User()->avatar)
                                <img class="user-image" src="{{route('profile', ['filename' =>Auth::User()->avatar])}}" alt="User Image">
                            @else
                                <img src="{{asset('img/profile.jpg')}}" class="user-image" alt="User Image">
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::User()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::User()->avatar)
                                    <img class="img-circle" src="{{route('profile', ['filename' =>Auth::User()->avatar])}}" alt="User Image">
                                @else
                                    <img src="{{asset('img/profile.jpg')}}" class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{Auth::User()->name}} -
                                    @if(Auth::User()->role == 0)
                                        Administrador
                                    @else
                                        Operardor
                                    @endif
                                    <small>Miembro desde {{\Carbon\Carbon::parse(Auth::User()->created_at)->format('M.Y')}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('configUser')}}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="{{route('configUser')}}"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @if(isset(Auth::User()->name))
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">

                    @if(Auth::User()->avatar)
                        <img src="{{route('profile', ['filename' =>Auth::User()->avatar])}}" class="img-circle tests" alt="User Image">
                    @else
                        <img src="{{asset('img/profile.jpg')}}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{Auth::User()->email}}</p>
                    <!-- Status -->
                    @if(Auth::User()->state == 0)
                    <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
                    @else
                        <a href="#"><i class="fa fa-circle text-danger"></i> Desconectado</a>
                    @endif
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <li>
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> <span> Inicio</span></a>
                </li>



                <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-cogs"></i> <span> Administrar</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::User()->role == 0 && Auth::User()->state == 0)
                        <li><a href="{{route('getUsers')}}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                        <li><a href="{{route('getMunicipios')}}"><i class="fa fa-circle-o"></i>Municipios</a></li>
                        <li><a href="{{route('getSubDelegaciones')}}"><i class="fa fa-circle-o"></i>Sub delegaciones</a></li>
                        <li><a href="{{route('getEnfermedades')}}"><i class="fa fa-circle-o"></i>Enfermedades</a></li>
                        <li><a href="{{route('getEmergencias')}}"><i class="fa fa-circle-o"></i>Emergencias</a></li>
                        @endif

                        @if(Auth::User()->state == 0)
                        <li><a href="{{route('getPacientes')}}"><i class="fa fa-circle-o"></i>Pacientes</a></li>
                        <li><a href="{{route('getFallecidos')}}"><i class="fa fa-circle-o"></i>Fallecidos</a></li>
                        @endif
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
                        @if(Auth::User()->state == 0)
                        <li><a href="{{route('all')}}"><i class="fa fa-circle-o"></i>General</a></li>
                        <li><a href="{{route('day')}}"><i class="fa fa-circle-o"></i>Dias</a></li>
                        <li><a href="{{route('month')}}"><i class="fa fa-circle-o"></i>Mes</a></li>
                        <li><a href="{{route('year')}}"><i class="fa fa-circle-o"></i>Año</a></li>
                        <li><a href="{{route('reports')}}"><i class="fa fa-circle-o"></i>Reportes</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    @endif

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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

{{--Data table--}}
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
{{--ChartJS--}}
<script src="{{asset('js/Chart.min.js')}}"></script>
{{--Graph--}}
<script src="{{asset('js/graficas.js')}}"></script>
<script src="{{asset('js/resources.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            //para cambiar el lenguaje a español
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing":"Procesando...",
            }
        });
    });

    $(document).on('click', 'ul li', function (){
        $(this).addClass('active').siblings().removeClass('active');
    });
</script>

</body>
</html>

