<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="INNOVA-GH">

     

        <title>GNASSM MIS PORTAL: @yield('title') </title>

        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        
        <!-- Notifications css -->
        <link href="/assets/notifications/notification.css" rel="stylesheet" />
        
         <!-- DataTables -->
        <link href="/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/datatables/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/helper.css" rel="stylesheet">

        <link href="/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

        
        @yield('heading')

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="{{ url('/home') }}" class="logo-expanded">
                    <i class="ion-settings"></i>
                    <span class="nav-label">GNASSM-MIS</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i></i> <span class="nav-label">Home</span></a></li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-users"></i> <span class="nav-label">Membership</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/members') }}">Member List</a></li>
                            <li><a href="{{ url('/members/new') }}">New Membership</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-building fa-lg" aria-hidden="true"></i> <span class="nav-label">Concessions</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/concessions') }}">Concession List</a></li>
                            <li><a href="{{ url('/concessions/new') }}">New Concession</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span class="nav-label">Levies/Dues</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/payments') }}">Payments List</a></li>
                            <li><a href="{{ url('/payments/new') }}">Add Payments</a></li>
                            <li><a href="#">Invoices</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> <span class="nav-label">Reports</span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Recent Members</a></li>
                            <li><a href="#">Recent Concessions</a></li>
                            <li><a href="#">Overdue Payments</a></li>
                            @if (Auth::check() and Auth::user()->role=='admin')
                            <li><a href="{{ url('/reports/useractivity') }}">User Activity</a></li>
                            @endif
                        </ul>
                    </li>
                    
                    <li class="has-submenu"><a href="#"><i class="fa fa-bell"></i> <span class="nav-label">Notification</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/notifications/email')}}"> Email</a></li>
                            <li><a href="{{ url('/notifications/sms')}}"> SMS</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span></a>
                        <ul class="list-unstyled">
                            
                            @if (Auth::check() and Auth::user()->role=='admin')
                            <li><a href="{{ url('/users') }}">User Setup</a></li>
                            @endif
                            <li><a href="{{ url('/user/profile')}}">My Profile</a></li>

                        </ul>
                    </li>
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Search -->
                
                
                <!-- Left navbar -->
                <nav class=" navbar-default hidden-xs" role="navigation">
                    <ul class="nav navbar-nav">
                    </ul>
                </nav>
                
                <!-- Right navbar -->
                <ul class="list-inline navbar-right top-menu top-right-menu">  
                    <!-- mesages -->  
                    <!-- /messages -->
                    
                    <!-- /Notification -->

                    <!-- user login dropdown start-->
                    <li class="dropdown text-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/img/user.png" class="img-circle profile-img thumb-sm">
                            <span class="username">{{ Auth::check() ? Auth::user()->name : 'Account'}} </span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                            <li><a href="{{ url('/user/profile') }}"><i class="fa fa-briefcase"></i>Profile</a></li>
                            <li><a href="{{Auth::check() ? url('/auth/logout') : url('/auth/login')}}"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->       
                </ul>
                <!-- End right navbar -->

            </header>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            @yield('content')

                    
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <footer class="footer">
                2016 © INNOVA GHANA.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/modernizr.min.js"></script>
        <script src="/js/pace.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/jquery.scrollTo.min.js"></script>
        <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="/assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="/js/waypoints.min.js" type="text/javascript"></script>
        <script src="/js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- EASY PIE CHART JS -->
        <script src="/assets/easypie-chart/easypiechart.min.js"></script>
        <script src="/assets/easypie-chart/jquery.easypiechart.min.js"></script>
        <script src="/assets/easypie-chart/example.js"></script>


        <!--C3 Chart-->
        <script src="/assets/c3-chart/d3.v3.min.js"></script>
        <script src="/assets/c3-chart/c3.js"></script>

        <!--Morris Chart-->
        <script src="/assets/morris/morris.min.js"></script>
        <script src="/assets/morris/raphael.min.js"></script>

        <!-- sparkline --> 
        <script src="/assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="/assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script> 

        <!-- sweet alerts -->
        <script src="/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="/assets/sweet-alert/sweet-alert.init.js"></script>
        
        <script src="/assets/notifications/notify.min.js"></script>
        <script src="/assets/notifications/notify-metro.js"></script>
        <script src="/assets/notifications/notifications.js"></script>

        <script src="/js/jquery.app.js"></script>
        <script src="/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/datatables/dataTables.tableTools.js"></script>
        
        <script src="/assets/datatables/dataTables.bootstrap.js"></script>
        <script src="/assets/timepicker/bootstrap-datepicker.js"></script>
        
        <!-- Chat -->
        <script src="/js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="/js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="/js/jquery.todo.js"></script>
        
        <!-- Newly Added -->
        @yield('script')


        <script type="text/javascript">

        /* ==============================================
             Counter Up
             =============================================== */
            $(document).ready(function() {
                $('#Membersdatatable').dataTable();
                $('#Paymentsdatatable').dataTable();
                $('#useractivityreport').dataTable();
                           
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });


                @yield('jquery')
            });
        </script>
    
        

    </body>
</html>
