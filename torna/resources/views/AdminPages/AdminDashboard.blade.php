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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">


</head>


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
        <div class="nav">
            <div class="nav-header" style="background-color: #ffffdb; height: 63px; display: flex; align-items: center; justify-content: center;">
                <div class="brand-logo">
                    <a href="/AdminDashboard">
                        <b class="logo-abbr"><img src="" alt=""> </b>
                        <span class="logo-compact"><img src="" alt=""></span>
                        <span class="brand-title" style="color: #ffffdb; font-weight: bold; font-size: 20px;">
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
        <div class="header" style="background-color: #ffbe07; height: 63px;">
               
                <div class="header-content clearfix">
                    
                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
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
        
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
        <div class="nk-sidebar" style="margin-top: -17px;"> 
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/AdminDashboard" aria-expanded="false" >
                            <i class="bi bi-house-door-fill"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li>
                        <a  href="/industrymaster" aria-expanded="false" >
                            <i class="bi bi-buildings-fill"></i><span class="nav-text">Industry</span>
                        </a>
                        
                    </li>
                    <li>
                        <a  href="/auditlog" aria-expanded="false" >
                            <i class="bi bi-card-list"></i><span class="nav-text">Audit Log</span>
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
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #c2c2c2; color: black; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <div class="d-flex justify-content-between align-items-center">
                                   
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-2 col-sm-6">
                                        <div class="compact-card gradient-9">
                                            <div class="card-body">
                                                <h1 class="card-title text-white">Organiser </br></br></h1>
                                                <div class="d-inline-block">
                                                    <span class="float-right display-5 opacity-9"><i class="fa fa-arrow-right"></i></span>
                                                    <a href="" class="text-white mb-0"></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-1">
                                            <div class="card-body">
                                                <h1 class="card-title text-white">Unapproved Organizer Count</h1>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $unapprovedOrgCount }}</h2>
                                                    <a href="/unapprovedorgcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa fa-exclamation-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-2">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Approved Organizer Count</h3>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $approvedOrgCount }}</h2>
                                                    <a href="/approvedorgcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-person-circle-check"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-3">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Rejected Organizer Count</h3>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $rejectedOrgCount }}</h2>
                                                    <a href="/rejectedorgcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa fa-ban"></i></span>
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                                <br />
                                <br />
                                <div class="row justify-content-center">
                                    <div class="col-lg-2 col-sm-6">
                                        <div class="compact-card gradient-9">
                                            <div class="card-body">
                                                <h1 class="card-title text-white">Exhibitor </br></br></h1>
                                                <div class="d-inline-block">
                                                    <span class="float-right display-5 opacity-9"><i class="fa fa-arrow-right"></i></span>
                                                    <a href="" class="text-white mb-0"></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-1">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Unapproved Exhibitor Count</h3>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $unapprovedExCount }}</h2>
                                                    <a href="/unapprovedexcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa fa-exclamation-circle"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-2">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Approved Exhibitor Count</h3>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $approvedExCount }}</h2>
                                                    <a href="/approvedexcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-person-circle-check"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="compact-card gradient-3">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Rejected Exhibitor </br> Count</h3>
                                                <div class="d-inline-block">
                                                    <h2 class="text-white">{{ $rejectedExCount }}</h2>
                                                    <a href="/rejectedexcount" class="text-white mb-0">View All</a>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa fa-ban"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                               
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
