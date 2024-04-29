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
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

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
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/ExDashboard">
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
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
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
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <li class="nav-label">Dashboard</li> --}}
                    <li>
                        <a  href="/ExDashboard" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li>
                        <a  href="/companysetupform" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Company Details </span>
                        </a>
                    </li>
                    
            
                    
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Exhibitions</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/createExhibitionform-E">Create New Exhibition</a></li>
                            <li><a href="/pastExhibitions">Past Exhibition</a></li>
                            <li><a href="/upcomingExhibitions">Upcoming Exhibition</a></li>
                            <li><a href="/participatedExhibitions">Participated Exhibitions</a></li>


                        </ul>
                    </li>
                    <li>
                        <a  href="/products" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Products/Services</span>
                        </a>
                    </li>
                    <li>
                        <a  href="/documents" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Documents</span>
                        </a>
                    </li>
                    <li>
                        <a  href="/notificationSetting" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Notification Setting</span>
                        </a>
                    </li>
                   
                    {{-- <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                            <li><a href="./email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a href="./app-calender.html">Calender</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li> --}}
                        {{-- <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-cards.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li> --}}
                        <!-- </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false"> -->
                            {{-- <li><a href="./uc-nestedable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
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
            

            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card">
                            <h2 class="card-header text-center mt-2">Create Exhibition</h2>
            
                            <div class="card-body">
                                <form method="POST" action="/createExhibitionE" enctype="multipart/form-data">
                                    @csrf
            
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="exhibition_name" class="col-form-label text-md-right">Exhibition Name <span style="color: red;">*</span></label>
                                            <input id="exhibition_name" name="exhibition_name" type="text" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="from_date" class="col-form-label text-md-right">From Date <span style="color: red;">*</span></label>
                                            <input id="from_date" name="from_date" type="date" class="form-control" required>
                                        </div>
            
                                        <div class="col-md-4">
                                            <label for="to_date" class="col-form-label text-md-right">To Date <span style="color: red;">*</span></label>
                                            <input id="to_date" name="to_date" type="date" class="form-control" required>
                                        </div>
            
                                    </div>
            
                                    <div class="row">
                                        
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="start_time" class="col-form-label text-md-right">Start Time <span style="color: red;">*</span></label>
                                            <input id="start_time" name="start_time" type="time" class="form-control" required>
                                        </div>
            
                                        <div class="col-md-4">
                                            <label for="end_time" class="col-form-label text-md-right">End Time <span style="color: red;">*</span></label>
                                            <input id="end_time" name="end_time" type="time" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="venue" class="col-form-label text-md-right">Venue <span style="color: red;">*</span></label>
                                            <input id="venue" name="venue" type="text" class="form-control" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        
            
                                        {{-- <div class="col-md-6">
                                            <label for="organized_by" class="col-form-label text-md-right">Organized By</label>
                                            <input id="organized_by" name="organized_by" type="text" class="form-control" required>
                                        </div> --}}
                                    </div>
            
            
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="exhibition_website" class="col-form-label text-md-right">Exhibition Website</label>
                                            <input id="exhibition_website" name="exhibition_website" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="attach_document" class="col-form-label text-md-right">Attach Document</label>
                                            <input id="attach_document" name="attach_document" type="file" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="registration_url" class="col-form-label text-md-right">Registration URL</label>
                                            <input id="registration_url" name="registration_url" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        
            
                                        <div class="col-md-4">
                                            <label for="company_logo" class="col-form-label text-md-right">Upload Exhibition image</label>
                                            <input id="company_logo" name="company_logo" type="file" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label text-md-right">Industry <span style="color: red;">*</span></label>
                                            <select name="industry_name" class="form-control" required>
                                                <option value="">Select Industry</option>
                                                @foreach($industries as $industry)
                                                <option value="{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label text-md-right">Status <span style="color: red;">*</span></label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="active_status" id="Active" value="Active" checked>
                                                        <label class="form-check-label" for="Active">Active</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="active_status" id="Inactive" value="Inactive">
                                                        <label class="form-check-label" for="Inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
            
            
            
            
            
                                    <br />
                                    <div class="form-group row justify-content-center mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="">NixcelSoft</a> 2024</p>
            </div>
        </div> --}}
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/plugins/common/common.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/gleek.js"></script>
    <script src="/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/plugins/d3v3/index.js"></script>
    <script src="/plugins/topojson/topojson.min.js"></script>
    <script src="/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/plugins/raphael/raphael.min.js"></script>
    <script src="/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/plugins/chartist/js/chartist.min.js"></script>
    <script src="/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="/js/dashboard/dashboard-1.js"></script>

</body>

</html>
