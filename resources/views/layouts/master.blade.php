<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/adminlte.css">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('sass/app.scss') }}"> --}}
    
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notificaciones</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-envelope mr-2"></i> 4 Mensajes
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-users mr-2"></i> 8 Usuarios
                            <span class="float-right text-muted text-sm">12 horas</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-file mr-2"></i> 3 Reportes
                            <span class="float-right text-muted text-sm">2 dias</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" data-slide="true" href="#">Salir&nbsp;<i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Aplicacion</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info text-white">
                        {{Auth::user()->name}}
                        {{-- <a href="#" class="d-block">Usuario</a> --}}
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>
                                    Dashboard
                                    {{-- <span class="right badge badge-danger">Info</span> --}}
                                </p>
                            </router-link>
                        </li>
                        
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>
                                    Managment
                                    <span class="right badge badge-danger">Info</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    Inventario
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <router-link to="/users"class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Users v1</p>
                                  </router-link>
                                </li>
                                <li class="nav-item">
                                  <a href="./index2.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="./index3.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                  </a>
                                </li>
                              </ul>
                        </li>
                      
                        <li class="nav-header">Opciones</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-primary"></i>
                                <p class="text">Contacto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-primary"></i>
                                <p class="text">Profile</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-primary"></i>
                                <p class="text">Logout</p>
                            </a> --}}
                            {{-- here to go to controller logout --}}
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-circle-o text-primary"></i>
                                <p>
                                    {{ __('Logout') }}    
                                </p>            
                                
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- Main content --}}
                <div class="content">
                    <div class="">
                        <router-view></router-view>
                    </div>
                </div>
           {{-- @yield('content') --}}
           {{-- / main content --}}
        </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="http://adminlte.io">StackedMindsOfficial</a>.</strong>
        Para uso libre.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="js/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.js"></script>
  
 
</body>

</html>
