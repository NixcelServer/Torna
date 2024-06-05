<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
    <title>ConneXha</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- Include Bootstrap CSS if not already included -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Include Bootstrap JS if not already included -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
{{-- form validations scripts  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#exhibition_website').on('input', function() {
            var val = $(this).val();
            if (!isValidUrl(val)) {
                $('#exhibitionWebsiteError').text('Please enter a valid website URL.');
                $(this).addClass('is-invalid');
            } else {
                $('#exhibitionWebsiteError').text('');
                $(this).removeClass('is-invalid');
            }
        });
        // Function to validate URL format
        function isValidUrl(url) {
            var urlRegex = /^(https?:\/\/)?([\w\d-]+\.)*[\w\d-]+\.[\w\d]{2,}(\/.*)?$/i;
            return urlRegex.test(url);
        }
    });

    $(document).ready(function() {
        $('#registration_url').on('input', function() {
            var val = $(this).val();
            if (!isValidUrl(val)) {
                $('#registrationUrlError').text('Please enter a valid URL.');
                $(this).addClass('is-invalid');
            } else {
                $('#registrationUrlError').text('');
                $(this).removeClass('is-invalid');
            }
        });
        // Function to validate URL format
        function isValidUrl(url) {
            var urlRegex = /^(https?:\/\/)?([\w\d-]+\.)*[\w\d-]+\.[\w\d]{2,}(\/.*)?$/i;
            return urlRegex.test(url);
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
                    <a href="/upcomingExhibitions">
                        <b class="logo-abbr"><img src="" alt=""> </b>
                        <span class="logo-compact"><img src="" alt=""></span>
                        <span class="brand-title" style="color: #ffffdb; font-size: 20px; font-family: sans-serif;">
                            Conne<span style="font-family: 'Bebas Neue', sans-serif; font-weight: 700; color: #ffbe07;">Xha.</span>
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
                        <a href="/upcomingExhibitions" aria-expanded="false">
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
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card">
                            <h4 class="card-header text-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px;  font-weight: bold;">Create Exhibition Form</h4>
                            <div class="card-body">
                                <form method="POST" action="/createExhibitionE" enctype="multipart/form-data" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exhibition_name" class="col-form-label text-md-right">Exhibition Name <span style="color: red;">*</span></label>
                                            <input id="exhibition_name" name="exhibition_name" type="text" class="form-control" value="{{ old('exhibition_name') }}" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            @if ($errors->has('exhibition_name'))
                                                <span id="exhibitionNameError" class="text-danger">{{ $errors->first('exhibition_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="from_date" class="col-form-label text-md-right">From Date <span style="color: red;">*</span></label>
                                            <input id="from_date" name="from_date" type="date" class="form-control" min="{{ date('Y-m-d') }}" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="to_date" class="col-form-label text-md-right">To Date <span style="color: red;">*</span></label>
                                            <input id="to_date" name="to_date" type="date" class="form-control" min="{{ date('Y-m-d') }}" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            <span id="date-error" style="color: red; display: none;">To date should not be less than from date.</span>
                                        </div>
                                        <script>
    document.getElementById('from_date').addEventListener('change', function() {
        var toDateInput = document.getElementById('to_date');
        var fromDateValue = this.value;
        
        // Set the minimum selectable date for "to date" input field
        toDateInput.min = fromDateValue;
        
        // Reset the value of "to date" if it's before "from date"
        if (toDateInput.value < fromDateValue) {
            toDateInput.value = '';
        }
    });
</script>
                                        <script>
    document.getElementById('to_date').addEventListener('change', function() {
        var fromDate = document.getElementById('from_date').value;
        var toDate = this.value;

        if (fromDate && toDate < fromDate) {
            document.getElementById('date-error').style.display = 'inline';
            this.value = ''; // Clear the "to date" input
        } else {
            document.getElementById('date-error').style.display = 'none';
        }
    });
</script>
                                    </div>           
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="start_time" class="col-form-label text-md-right">Start Time <span style="color: red;">*</span></label>
                                            <input id="start_time" name="start_time" type="time" class="form-control" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                        </div>            
                                        <div class="col-md-4">
                                            <label for="end_time" class="col-form-label text-md-right">End Time <span style="color: red;">*</span></label>
                                            <input id="end_time" name="end_time" type="time" class="form-control" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="venue" class="col-form-label text-md-right">Venue <span style="color: red;">*</span></label>
                                            <input id="venue" name="venue" type="text" class="form-control" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exhibition_website" class="col-form-label text-md-right">Exhibition Website</label>
                                            <input id="exhibition_website" name="exhibition_website" type="text" class="form-control" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            <small id="exhibitionWebsiteError" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="attach_document" class="col-form-label text-md-right">Attach Document</label>
                                            <input id="attach_document" name="attach_document" type="file" class="form-control" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            <small class="form-text text-muted">Please Attach Document in PDF format.</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="registration_url" class="col-form-label text-md-right">Registration URL</label>
                                            <input id="registration_url" name="registration_url" type="text" class="form-control" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            <small id="registrationUrlError" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="company_logo" class="col-form-label text-md-right">Upload Exhibition image</label>
                                            <input id="company_logo" name="company_logo" type="file" class="form-control" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                            <small class="form-text text-muted">Please upload an image in JPG or JPEG format.</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label text-md-right">Industry <span style="color: red;">*</span></label>
                                            <select name="industry_name" class="form-control" required <?= $approvedStatus === false ? 'disabled' : '' ?>>
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
                                                        <input class="form-check-input" type="radio" name="active_status" id="Active" value="Active" checked <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                                        <label class="form-check-label" for="Active">Active</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="active_status" id="Inactive" value="Inactive" <?= $approvedStatus === false ? 'disabled' : '' ?>>
                                                        <label class="form-check-label" for="Inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group row justify-content-center mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success" <?= $approvedStatus === false ? 'disabled' : '' ?>>
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
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php if ($approvedStatus === false): ?>
    <script>
        // Ensure that SweetAlert2 library is loaded
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'You Cannot create exhibition! You are not approved !',
                text: "",
                icon: 'info', // or 'info', 'success', 'error' as appropriate
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the notification settings page
                    window.location.href = "/ExDashboard";
                }
            });
        });
    </script>
    <?php endif; ?>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add event listener to the input field
        $('#exhibition_name').on('input', function() {
            // Hide the error message when the input value changes
            $('#exhibitionNameError').hide();
        });
    });
</script>
</body>
</html>
