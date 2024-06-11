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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<style>
    .card {
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 1, 1, 1);
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.04); /* Scale the card up slightly on hover */
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
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="60" width="40" alt="">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-header text-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">Upcoming Exhibitions List</h4>
                        <br/>
                        <div class="row">
                            @foreach($upcomingExs as $key => $upcomingEx)
                            <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                                <div class="card">
                                    @if($upcomingEx->company_logo)
                                    <img src="data:image/png;base64,{{ $upcomingEx->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                            {{ $upcomingEx->exhibition_name }}
                                        </h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-calendar-alt mr-2"></i>
                                                    <span class="font-weight-bold">Date:</span>
                                                </div>
                                                <div>
                                                    <span>{{ \Carbon\Carbon::parse($upcomingEx->ex_from_date)->format('d M Y') }}</span>
                                                    <span class="mx-2">-</span>
                                                    <span>{{ \Carbon\Carbon::parse($upcomingEx->ex_to_date)->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-clock mr-2"></i>
                                                    <span class="font-weight-bold">Time:</span>
                                                </div>
                                                <div>
                                                    <span>{{ $upcomingEx->start_time }}</span>
                                                    <span class="mx-2">-</span>
                                                    <span>{{ $upcomingEx->end_time }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                                    <span class="font-weight-bold">Venue:</span>
                                                </div>
                                                <div>
                                                    <span>{{ $upcomingEx->venue }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-globe mr-2"></i>
                                                    <span class="font-weight-bold">Website:</span>
                                                </div>
                                                <div>
                                                    <a href="{{ $upcomingEx->exhibition_website }}" target="_blank">{{ $upcomingEx->exhibition_website }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-external-link-alt mr-2"></i>
                                                    <span class="font-weight-bold">Register:</span>
                                                </div>
                                                <div>
                                                    <a href="{{ $upcomingEx->registration_url }}" target="_blank">{{ $upcomingEx->registration_url }}</a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-file-alt mr-2"></i>
                                                    <span class="font-weight-bold">Document:</span>
                                                </div>
                                                <div>
                                                    <button class="btn btn-sm btn-success view-document-btn" data-toggle="modal" data-target="#documentModal">View Document</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn mb-1 {{ $upcomingEx->participated ? 'btn-sm btn-success' : 'btn-sm btn-outline-primary' }}" 
                                            {{ $upcomingEx->participated ? 'disabled title=Already_Participated! data-toggle=tooltip' : ($approvedStatus === false ? 'disabled' : '') }}
                                            data-id="{{ $upcomingEx->encExId }}" 
                                            onclick="confirmParticipation(event)">
                                            @if($upcomingEx->participated)
                                                Participated
                                            @else
                                                Participate
                                            @endif
                                        </button>                                                                                                  
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentModalLabel">View Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach($upcomingExs as $key => $upcomingEx)
                        <!-- Embed the document content from the preloaded data -->
                        <embed src="data:application/pdf;base64,{{ $upcomingEx->attach_document }}" type="application/pdf" width="100%" height="500px" />
                        @endforeach    
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    <?php if ($showReminder): ?>
    <script>
        // Display the popup when the page is loaded
        Swal.fire({
            title: 'Please fill your details in notification settings',
            text: "",
            icon: '',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Handle participation logic here, e.g., submit a form or make an AJAX request
                window.location.href = "/notificationSetting";
            }
        });
    </script>
    <?php endif; ?>
        <script>
            function confirmParticipation(event) {
                event.preventDefault();
                const encExId = event.target.getAttribute('data-id');
                // const encExId = this.getAttribute('data-id');
                // console.log(encExId);
                Swal.fire({
                    title: 'Are you excited to participate?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, participate!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Handle participation logic here, e.g., submit a form or make an AJAX request   
                        //console.log(encExId);
                        window.location.href = "/participate/" + encExId;
                        //window.location.href = "/participatedExhibitions";
                        // Example AJAX request
                        // $.post('/participate', { exhibitionId: exhibitionId }, function(response) {
                        //     // Handle response from server
                        // });
                        //Swal.fire('Participation confirmed!', '', 'success');
                    }
                });
            }
        </script>
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
                title: 'You Cannot participate in exhibition!</br>You are not approved!',
                text: "",
                icon: 'warning', // or 'info', 'success', 'error' as appropriate
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
</body>
</html>
