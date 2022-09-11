<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@section('page_title') @show</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/assets/panel/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="/assets/panel/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/panel/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/assets/panel/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/assets/panel/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/panel/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/assets/panel/dist/css/skins/_all-skins.min.css">

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

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    {{-- name logo mini --}}
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b> {{ __('messages.welcome') }} </b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">
                                    {{-- input --}}
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"> {{
                                    // {{-- input --}}
                                    __('messages.new_notification') }}
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i>
                                                {{
                                                // {{-- input --}}
                                                __('messages.new_user_singup') }}

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i>
                                                {{ __('messages.change_name_user') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i>
                                                {{ __('messages.new_order') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">
                                        {{ __('messages.show_all') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/assets/panel/dist/img/dravatar.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    {{$data['drugstoreName']}}
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/assets/panel/dist/img/dravatar.png" class="img-circle" alt="User Image">

                                    <p>
                                        {{$data['drugstoreName']}}

                                        {{-- <small>{{$data['drugstoreLevel']}}</small> --}}
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">
                                            {{ __('messages.profile') }}
                                        </a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="{{url('drugstore/panel/logout')}}" class="btn btn-default btn-flat">
                                            {{ __('messages.exit') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- right side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-right image">
                        <img src="/assets/panel/dist/img/dravatar.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-right info">
                        <p>{{$data['drugstoreName']}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                        </a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="جستجو">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">
                        {{ __('messages.menu') }}
                    </li>
                    <li class="@if(Request::url() === asset('/drugstore/panel/dashboard')) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>
                                {{ __('messages.dashboard') }}
                            </span>
                            <span class="pull-left-container">
                                <i class="fa fa-angle-right pull-left"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(Request::url() === asset('/drugstore/panel/dashboard')) active @endif">
                                <a href="/doctor/panel/dashboard"><i class="fa fa-circle-o"></i>
                                    {{ __('messages.dashboard') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li
                        class="@if(Request::url() === asset('/drugstore/panel/drugstores')) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>داروخانه</span>
                            <span class="pull-left-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/drugstore/panel/drugstores"><i
                                        class="@if(Request::url() === asset('/drugstore/panel/drugstores')) active @endif fa fa-circle-o"></i>لیست
                                    داروخانه</a></li>
                            <li><a href="/drugstore/panel/drugstore/new"><i
                                        class="@if(Request::url() === asset('/drugstore/panel/drugstores')) active @endif fa fa-circle-o"></i>افزودن
                                    داروخانه</a></li>
                        </ul>
                    </li>
                    <li class="@if(Request::url() === asset('/doctor/panel/prescriptions')) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>پزشکان</span>
                            <span class="pull-left-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/drugstore/panel/doctor"><i
                                        class="@if(Request::url() === asset('/drugstore/panel/doctor')) active @endif fa fa-circle-o"></i>لیست
                                    پزشکان</a></li>
                            <li><a href="/drugstore/panel/doctor/new"><i
                                        class="@if(Request::url() === asset('/drugstore/panel/doctor')) active @endif fa fa-circle-o"></i>افزودن
                                    پزشک</a></li>
                        </ul>
                    </li>
                    <li class="@if(Request::url() === asset('/doctor/panel/product')) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>دارو</span>
                            <span class="pull-left-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/doctor/panel/product"><i
                                        class="@if(Request::url() === asset('/doctor/panel/product')) active @endif fa fa-circle-o"></i>لیست
                                    دارو</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="row">
                @if (count($errors) > 0)
                @if(substr_count($errors,'danger'))
                <div class="alert alert-danger fade in alert-dismissible show">
                    @elseif(substr_count($errors,'success'))
                    <div class="alert alert-success fade in alert-dismissible show">
                        @elseif(substr_count($errors,'warning'))
                        <div class="alert alert-warning fade in alert-dismissible show">
                            @else
                            <div class="alert alert-danger fade in alert-dismissible show">
                                @endif
                                <button type="button" class="close" data-dismiss="alert">&times;
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        @yield('main')
                    </div>
                    <!-- /.content-wrapper -->
                    <footer class="main-footer text-left">
                        <strong>Copyleft &copy; 2022 <a href="https://pnv.ir">
                                {{ __('messages.Vira_Company') }}
                            </a></strong>
                    </footer>

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Create the tabs -->
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Home tab content -->
                            <div class="tab-pane" id="control-sidebar-home-tab">
                                <h3 class="control-sidebar-heading">فعالیت ها</h3>
                                <ul class="control-sidebar-menu">
                                </ul>
                                <!-- /.control-sidebar-menu -->

                                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                                <ul class="control-sidebar-menu">

                                </ul>
                                <!-- /.control-sidebar-menu -->

                            </div>
                        </div>
                    </aside>

                    <div class="control-sidebar-bg"></div>
                </div>
                <!-- ./wrapper -->

                <!-- jQuery 3 -->
                <script src="/assets/panel/bower_components/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap 3.3.7 -->
                <script src="/assets/panel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <!-- FastClick -->
                <script src="/assets/panel/bower_components/fastclick/lib/fastclick.js"></script>
                <!-- AdminLTE App -->
                <script src="/assets/panel/dist/js/AdminLTE.min.js"></script>
                <!-- Sparkline -->
                <script src="/assets/panel/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
                <!-- jvectormap  -->
                <script src="/assets/panel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                <script src="/assets/panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                <!-- SlimScroll -->
                <script src="/assets/panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                <!-- ChartJS -->
                <script src="/assets/panel/bower_components/Chart.js/Chart.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="/assets/panel/dist/js/pages/dashboard2.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="/assets/panel/dist/js/demo.js"></script>

</body>

</html>