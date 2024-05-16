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
{{-- Validation Scripts  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#val-whatsapp-no').on('input', function() {
            var val = $(this).val();
            if (!isValidWhatsAppNo(val)) {
                $('#whatsappError').text('Please enter a valid 10-digit WhatsApp number.');
                $(this).addClass('is-invalid');
            } else {
                $('#whatsappError').text('');
                $(this).removeClass('is-invalid');
            }
        });

        function isValidWhatsAppNo(whatsappNo) {
            var whatsappNoRegex = /^\d{10}$/; // Regex for exactly 10 digits
            return whatsappNoRegex.test(whatsappNo);
        }
    });


    $(document).ready(function() {
        $('#val-sms-mobile_no').on('input', function() {
            var val = $(this).val();
            // Remove any non-numeric characters from the input
            var mobileNo = val.replace(/\D/g, '');

            if (!isValidMobileNo(mobileNo)) {
                $('#mobileError').text('Please enter a valid 10-digit mobile number.');
                $(this).addClass('is-invalid');
            } else {
                $('#mobileError').text('');
                $(this).removeClass('is-invalid');
            }
        });

        function isValidMobileNo(mobileNo) {
            var mobileNoRegex = /^\d{10}$/; // Regex for exactly 10 digits
            return mobileNoRegex.test(mobileNo);
        }
    });


    
</script>
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
                    <a href="">
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
        <div class="header" style="background-color: #FFBE07; height: 63px;">    
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> 
        <div class="nk-sidebar" style="margin-top: -17px;"> 
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/ExDashboard" aria-expanded="false">
                            <i class="bi bi-house-door-fill"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/companysetupform" aria-expanded="false">
                            <i class="bi bi-building menu-icon"></i><span class="nav-text">Company Details</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-calendar-week menu-icon"></i><span class="nav-text">Exhibitions</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/createExhibitionform-E"><i class="bi bi-plus-circle"></i><span class="nav-text">Create New Exhibition</span></a></li>
                            <li><a href="/pastExhibitions"><i class="bi bi-calendar-check"></i><span class="nav-text">Past Exhibition</span></a></li>
                            <li><a href="/upcomingExhibitions"><i class="bi bi-calendar-x"></i><span class="nav-text">Upcoming Exhibition</span></a></li>
                            <li><a href="/participatedExhibitions"><i class="bi bi-calendar-event"></i><span class="nav-text">Participated Exhibitions</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/products" aria-expanded="false">
                            <i class="bi bi-archive menu-icon"></i><span class="nav-text">Products/Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="/documents" aria-expanded="false">
                            <i class="bi bi-file-earmark-text menu-icon"></i><span class="nav-text">Documents</span>
                        </a>
                    </li>
                    <li>
                        <a href="/notificationSetting" aria-expanded="false">
                            <i class="bi bi-bell menu-icon"></i><span class="nav-text">Notification Setting</span>
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
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-header" style="background-color: #c2c2c2; color: black; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Email Setting Form</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="/notification-settings/email" method="post">
                                        @csrf
                                        <!-- Existing form fields -->
                                        <!-- Your new fields -->
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="smtp">SMTP <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                            @if ($emailDetails !== null)
                                                <input type="text" class="form-control" id="smtp" name="smtp" value="{{ $emailDetails->smtp}}" placeholder="SMTP server address">
                                                @else
                                                <input type="text" class="form-control" id="smtp" name="smtp"  placeholder="SMTP server address">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-port">Port <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                            @if ($emailDetails !== null)
                                                <input type="text" class="form-control" id="val-port" name="port" value="{{$emailDetails->port}}" placeholder="SMTP port number">
                                                @else
                                                <input type="text" class="form-control" id="val-port" name="port"  placeholder="SMTP port number">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-username-smtp">Username <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                            @if ($emailDetails !== null)
                                                <input type="text" class="form-control" id="val-username-smtp" name="username" value="{{$emailDetails->username}}"placeholder="SMTP username">
                                                @else
                                                <input type="text" class="form-control" id="val-username-smtp" name="username" placeholder="SMTP username">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-password-smtp">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                            @if ($emailDetails !== null)
                                                <input type="password" class="form-control" id="val-password-smtp" name="password" value="{{$emailDetails->password}}" placeholder="SMTP password">
                                                @else
                                                <input type="password" class="form-control" id="val-password-smtp" name="password"  placeholder="SMTP password">
                                                @endif
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Save Settings</button>
                                            </div>
                                        </div>
                                        <!-- End of new fields -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #c2c2c2; color: black; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Whatsapp Setting Form</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="" method="post">
                                        <!-- Existing form fields -->
                                        <!-- New field: WhatsApp Number -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-whatsapp-no">WhatsApp Number <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="whatsapp-addon">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="val-whatsapp-no" name="val-whatsapp-no" placeholder="Enter WhatsApp number">
                                                </div>
                                                <small id="whatsappError" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <!-- End of new field -->
                                        <!-- Submit button -->
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Save Settings</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #c2c2c2; color: black; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>SMS Setting Form</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="/notification-settings/sms" method="post">
                                        @csrf
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-sms-mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="mobile-addon">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="val-sms-mobile_no" name="mobileNo" placeholder="Enter Mobile Number">
                                                </div>
                                                <small id="mobileError" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <!-- New field: SMS Service -->
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-sms-service">Auth Token <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="val-sms-service" name="authToken" placeholder="Enter Auth Token">
                                            </div>
                                        </div>
                                        <!-- New field: SID -->
                                        <div class="row">
                                            <label class="col-lg-4 col-form-label" for="val-sid">SID <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="val-sid" name="sid" placeholder="Enter SID">
                                            </div>
                                        </div>
                                       <br/>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Save Settings</button>
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
