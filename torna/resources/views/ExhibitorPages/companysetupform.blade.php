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
    
    <!-- Custom Stylesheet -->
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

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
                                <div class="dropdown-content-body">
                                    <ul>
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h4 class="card-header text-center">Company Setup Form</h4>
        
                        <div class="card-body">
                        <form method="POST" action="/updatecompanydetailsE" enctype="multipart/form-data">
                                @csrf
        
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label for="company_name" class="col-form-label text-md-right">Company Name</label>
                                        <input id="company_name" name="company_name" type="text" value="{{ $company->company_name }}" class="form-control" name="company_name" required>
                                        <input id="encCompId" name="encCompId" type="hidden" value="{{ $company->encCompId }}" class="form-control">                                    </div>
                                    <div class="col-md-6">
                                        <label for="unique_name" class="col-form-label text-md-right">Unique Name</label>
                                        <input id="unique_name" name="unique_name" type="text" value="{{ $company->unique_name }}" class="form-control" name="unique_name" required autofocus>
                                    </div> 
                                </div>
                                
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="first_name" class="col-form-label text-md-right">Company Address</label>
                                        <input id="first_name" name="address" type="text" value="{{ $company->comp_address }}" class="form-control" name="first_name" required>
                                    </div>
        
                                    <div class="form-group col-md-6">
                                        <label for="last_name" class="col-form-label text-md-right">Company Website</label>
                                        <input id="last_name" name="website" type="text" value="{{ $company->comp_website }}" class="form-control" name="last_name" required>
                                    </div>
                                   
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="contact_no" class="col-form-label text-md-right">Contact Number</label>
                                        <input id="contact_no" name="contact_no" type="text" value="{{ $company->contact_no }}"  class="form-control" required>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="email" class="col-form-label text-md-right">Email ID</label>
                                        <input id="email" name="email" type="email" value="{{ $company->email }}"  class="form-control" required readonly>
                                    </div>
                                </div>
                                
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label for="password" class="col-form-label text-md-right">Password</label>
                                        <input id="password" name="password" type="password" class="form-control" required>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="col-form-label text-md-right">Confirm Password</label>
                                        <input id="confirm_password" name="confirm_password" type="password" class="form-control" required>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label  class="col-form-label text-md-right">Industry</label>
                                        <select  name="industry_name" class="form-control" required>
                                            <option value="">Select Industry</option>
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="logo" class="col-form-label text-md-right">Upload Logo</label>
                                        <input id="logo" name="logo" type="file" class="form-control-file" accept="image/*" required>
                                    </div>
                                </div>
        <br />
                                <div class="form-group row justify-content-center mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
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


    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>

</html>
