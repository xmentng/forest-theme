<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or "ChurchOnline admins Panel"}}</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('admins/images/favicon.png')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('admins/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admins/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admins/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admins/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admins/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admins/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('admins/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('admins/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>ChurchOnline Admin!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{asset('admins/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home </a></li>
                                <li><a href="{{ route('user.index') }}"><i class="fa fa-edit"></i> Members <span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li><a href="{{ route('church.index') }}"><i class="fa fa-user"></i> Churches </a></li>
                                <li><a href="{{ route('group.index') }}"><i class="fa fa-shopping-cart"></i> Cells </a></li>
                                <li><a href="{{ route('testimony.index') }}"><i class="fa fa-users"></i> Testimonies </a></li>
                                <li><a href="{{ route('transaction.index') }}"><i class="fa fa-users"></i> Partnerships </a></li>
                                <li><a href="{{ route('media.index') }}"><i class="fa fa-users"></i> Gallery </a></li>
                            </ul>
                        </div>
                    </div>



                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('admins/images/img.jpg')}}" alt="">Rodrick K
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('user.show','Auth::user()->id') }}"> Profile</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @include('templates.admins.partials.alerts')
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    ChurchOnline Admin Template by <a href="https://churchonline.org">Churchonline Creative Lab</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('admins/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admins/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admins/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admins/js/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admins/js/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('admins/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admins/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admins/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admins/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admins/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admins/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admins/js/datatables.scroller.min.js')}}"></script>
    <script src="{{asset('admins/js/jszip.min.js')}}"></script>
    <script src="{{asset('admins/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admins/js/vfs_fonts.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('admins/js/custom.min.js')}}"></script>

    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>
    <!-- /Datatables -->
</body>
</html>