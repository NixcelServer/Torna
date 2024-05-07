<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>Nixcel Exhibition</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>
<style>
    .sticky-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000; /* Adjust z-index as needed */
        background-color: #ffffff; /* Adjust background color as needed */
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow */
    }
    .sticky-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000; /* Adjust z-index as needed */
        background-color: #ffffff; /* Adjust background color as needed */
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add shadow */
    }
    .content-body {
        padding-top: 80px; /* Adjust based on header height */
    }
    .sticky-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh; /* Set height to viewport height */
        background-color: #ffffff; /* Adjust background color as needed */
        width: 230px; /* Adjust width as needed */
        padding-top: 80px; /* Optional: Add padding to top */
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow */
    }

    /* Optional: Adjust padding/margins for content to avoid overlap with the fixed sidebar */
    .content-body {
        margin-left: 250px; /* Adjust based on sidebar width */
       
    }
    .sticky-content-body {
        position: fixed;
        top: 20px;
        width: calc(100% - 250px); 
        overflow-y: auto;
        z-index: 999;
        left: 1px;
        height: 100vh;
        padding-top: 100px; /* Optional: Add padding to top */
        background-color: #ffffff; /* Optional: Add background color */
        box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1); /* Optional: Add shadow */
    }

    /* Optional: Adjust padding/margins for content to avoid overlap with the fixed content body */
    .container-fluid {
        margin-top: 80px; /* Adjust based on header height */
    }

    
</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav sticky-nav">
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="">
                        <b class="logo-abbr"><img src="" alt=""> </b>
                        <span class="logo-compact"><img src="" alt=""></span>
                        <span class="brand-title" style="color: white; font-weight: bold; font-size: 20px;">
                            TORNA
                        </span>
                            <img src="" alt="">
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header sticky-header">
            <div class="header">    
                <div class="header-content clearfix">
                    
                    {{-- <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div> --}}
                    <div class="header-left">
                        <div class="input-group icons">
                            
                            
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="images/user/1.png" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    @php
                                    $user = Session::get('user');
                                    @endphp
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><span>Hello {{ $user->first_name }}</span></li>
                                            <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
        <div class="nk-sidebar sticky-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <li class="nav-label">Dashboard</li> --}}
                    <li>
                        <a  href="/AdminDashboard" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li>
                        <a  href="/industrymaster" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Industry</span>
                        </a>
                        
                    </li>
                    <li>
                        <a  href="/auditlog" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Audit Log</span>
                        </a>
                        
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body sticky-content-body">
            <div class="container-fluid mt-1">
                <div class="row">
                    <!-- First row with three cards -->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body text-center">
                                <a href="/unapprovedorgcount">
                                    <h3 class="card-title text-white">Unapproved Organizer Count</h3>
                                </a>
                                <h1>{{ $unapprovedOrgCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body text-center">
                                <a href="/approvedorgcount">
                                    <h3 class="card-title text-white">Approved Organizer Count</h3>
                                </a>
                                <h1>{{ $approvedOrgCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body text-center">
                                <a href="/rejectedorgcount">
                                    <h3 class="card-title text-white">Rejected Organizer Count</h3>
                                </a>
                                <h1>{{ $rejectedOrgCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Second row with three cards -->
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body text-center">
                                <a href="/unapprovedexcount">
                                    <h3 class="card-title text-white">Unapproved Exhibitor Count</h3>
                                </a>
                                <h1>{{ $unapprovedExCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body text-center">
                                <a href="/approvedexcount">
                                    <h3 class="card-title text-white">Approved Exhibitor Count</h3>
                                </a>
                                <h1>{{ $approvedExCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body text-center">
                                <a href="/rejectedexcount">
                                    <h3 class="card-title text-white">Rejected Exhibitor Count</h3>
                                </a>
                                <h1>{{ $rejectedExCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>
