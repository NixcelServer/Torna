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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<style>
    .cardE {
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 1, 1, 1);
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }

    .cardE:hover {
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
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-header text-center" style="background-color: #c2c2c2; font-family: Arial, sans-serif; font-size: 18px;  font-weight: bold;">Past Exhibitions List</h4>
                                <br/>
                                <div class="row">
                                    @foreach($pastcomingExs as $key => $pastcomingEx)
                                        @if($pastcomingEx->participated)
                                            <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                                                <div class="cardE">
                                                    @if($pastcomingEx->company_logo)
                                                    <img src="data:image/png;base64,{{ $pastcomingEx->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                                            {{ $pastcomingEx->exhibition_name }}
                                                        </h5>
                                                        
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-calendar-alt mr-2"></i>
                                                                    <span class="font-weight-bold">Date:</span>
                                                                </div>
                                                                <div>
                                                                    <span>{{ \Carbon\Carbon::parse($pastcomingEx->ex_from_date)->format('d M Y') }}</span>
                                                                    <span class="mx-1">-</span>
                                                                    <span>{{ \Carbon\Carbon::parse($pastcomingEx->ex_to_date)->format('d M Y') }}</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-clock mr-2"></i>
                                                                    <span class="font-weight-bold">Time:</span>
                                                                </div>
                                                                <div>
                                                                    <span>{{ $pastcomingEx->start_time }}</span>
                                                                    <span class="mx-2">-</span>
                                                                    <span>{{ $pastcomingEx->end_time }}</span>
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
                                                                    <span>{{ $pastcomingEx->venue }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-globe mr-2"></i>
                                                                    <span class="font-weight-bold">Website:</span>
                                                                </div>
                                                                <div>
                                                                    <a href="{{ $pastcomingEx->exhibition_website }}" target="_blank">{{ $pastcomingEx->exhibition_website }}</a>
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
                                                                    <a href="{{ $pastcomingEx->registration_url }}" target="_blank">{{ $pastcomingEx->registration_url }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-database mr-2"></i>
                                                                    <span class="font-weight-bold">Collect Data:</span>
                                                                </div>
                                                                <div>
                                                                    <a href="{{ route('collectdata', ['id' => $pastcomingEx->encParticipatedId]) }}" class="btn btn-sm mb-1 btn-outline-warning">Collect Data</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                                            <div class="cardE" style="opacity: 0.5;">
                                                    @if($pastcomingEx->company_logo)
                                                    <img src="data:image/png;base64,{{ $pastcomingEx->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                                            {{ $pastcomingEx->exhibition_name }}
                                                        </h5>
                                                        <div class="row">                                                          
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-calendar-alt mr-2"></i>
                                                                    <span class="font-weight-bold">Date:</span>
                                                                </div>
                                                                <div>
                                                                    <span>{{ \Carbon\Carbon::parse($pastcomingEx->ex_from_date)->format('d M Y') }}</span>
                                                                    <span class="mx-2">-</span>
                                                                    <span>{{ \Carbon\Carbon::parse($pastcomingEx->ex_to_date)->format('d M Y') }}</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-clock mr-2"></i>
                                                                    <span class="font-weight-bold">Time:</span>
                                                                </div>
                                                                <div>
                                                                    <span>{{ $pastcomingEx->start_time }}</span>
                                                                    <span class="mx-2">-</span>
                                                                    <span>{{ $pastcomingEx->end_time }}</span>
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
                                                                    <span>{{ $pastcomingEx->venue }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-globe mr-2"></i>
                                                                    <span class="font-weight-bold">Website:</span>
                                                                </div>
                                                                <div>
                                                                    <a href="{{ $pastcomingEx->exhibition_website }}" target="_blank">{{ $pastcomingEx->exhibition_website }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </br>
                                                    
                                                        <p class="text-center" style="color: black;">You did not participate in this exhibition.</p>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <!-- Embed the document content from the preloaded data -->
                    <embed src="data:application/pdf;base64,{{ $pastcomingEx->attach_document }}" type="application/pdf" width="100%" height="500px" />
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Add this script in your HTML file, preferably at the end before </body> tag -->


    <!-- Add this script in your HTML file, preferably at the end before </body> tag -->

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changeStatusButtons = document.querySelectorAll('.change-status-btn');
    
            changeStatusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const exhibitionId = this.getAttribute('data-exhibition-id');
                    console.log("in function",exhibitionId);
                    debugger;
                    const updateUrl = this.getAttribute('data-update-url');
                    console.log(updateUrl);
                    const confirmation = confirm('Are you sure you want to change the status to Inactive?');
    
                    if (confirmation) {
                        fetch(updateUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id: exhibitionId,
                                status: 'Inactive' // You can modify this based on your requirements
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            alert(data.message); // Show success message
                            // You can update the UI or perform other actions as needed
                        })
                        .catch(error => {
                            console.error('Error updating status:', error);
                        });
                    }
                });
            });
        });
    </script> --}}








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
