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
        <div class="nav">
            <div class="nav-header" style="background-color: #ffffdb; height: 63px; display: flex; align-items: center; justify-content: center;">
                <div class="brand-logo">
                    <a href="/AdminDashboard">
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
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-people menu-icon"></i><span class="nav-text">Organizer Counts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="/unapprovedorgcount" aria-expanded="false">
                                    <i class="bi bi-person-x-fill"></i><span class="nav-text" style="font-size: smaller;">Unapproved Organizer Count</span>
                                </a>
                            </li>
                            <li>
                                <a href="/approvedorgcount" aria-expanded="false">
                                    <i class="bi bi-person-check-fill"></i><span class="nav-text" style="font-size: smaller;">Approved Organizer Count</span>
                                </a>
                            </li>
                            <li>
                                <a href="/rejectedorgcount" aria-expanded="false">
                                    <i class="bi bi-person-dash-fill"></i><span class="nav-text" style="font-size: smaller;">Rejected Organizer Count</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-person-lines-fill menu-icon"></i><span class="nav-text">Exhibitor Counts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="/unapprovedexcount" aria-expanded="false">
                                    <i class="bi bi-person-x-fill"></i><span class="nav-text" style="font-size: smaller;">Unapproved Exhibitor Count</span>
                                </a>
                            </li>
                            <li>
                                <a href="/approvedexcount" aria-expanded="false">
                                    <i class="bi bi-person-check-fill"></i><span class="nav-text" style="font-size: smaller;">Approved Exhibitor Count</span>
                                </a>
                            </li>
                            <li>
                                <a href="/rejectedexcount" aria-expanded="false">
                                    <i class="bi bi-person-dash-fill"></i><span class="nav-text" style="font-size: smaller;">Rejected Exhibitor Count</span>
                                </a>
                            </li>
                        </ul>
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
                                <h4 class="card-header text-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px;  font-weight: bold;">Unapproved Organizer List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Fisrt Name</th>
                                                <th>Last Name</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Contact No</th>
                                                <th>Requested Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($companies as $key => $organizer)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $organizer->first_name }}</td>
                                                <td>{{ $organizer->last_name }}</td>
                                                <td>{{ $organizer->company_name }}</td>
                                                <td>{{ $organizer->email }}</td>
                                                <td>{{ $organizer->contact_no }}</td>
                                                {{-- <td>{{ $organizer->created_at }}</td> --}}
                                                <td>{{ $organizer->registered_date }}</td>
                                                {{-- <td>
                                                    <button class="btn btn-sm btn-primary" onclick="openDocument('{{ $organizer->company_name }}', '{{ $organizer->email }}', '{{ $organizer->contact_no }}', '{{ $organizer->tbl_comp_id }}', '{{ $organizer->company_logo }}')">
                                                        View
                                                    </button>
                                                </td> --}}
                                                <td>
                                                    <button class="btn btn-sm btn-primary" style="background-color: #FFBE07; border-color: #FFBE07; color: #000;" onclick="openDocument('{{ $organizer->first_name }}','{{ $organizer->last_name }}','{{ $organizer->company_name }}', '{{ $organizer->email }}', '{{ $organizer->contact_no }}', '{{ $organizer->tbl_comp_id }}', '{{ $organizer->company_logo }}')">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for displaying document -->
        <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="documentModalLabel">Organizer Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img id="companyLogo" src="" alt="Company Logo" style="width: 735px; height: 200px;">
                                </br>
                                </br>
                                    <div class="row">
                                        <p style="margin-right: 20px;"><strong>First Name:</strong> <span id="firstName"></span></p>
                                        <p style="margin-right: 20px;"><strong>Last Name:</strong> <span id="lastName"></span></p>
                                        <p><strong>Contact No:</strong> <span id="contactNo"></span></p>
                                    </div>
                                </br>
                                    <div class="row">
                                        <p style="margin-right: 20px;"><strong>Company Name:</strong> <span id="companyName"></span></p>
                                        <p><strong>Email:</strong> <span id="email"></span></p>
                                    </div>
                                    
                                    <p><strong><span style="color: white;">Company Id:</span></strong> 
                                    <span id="compId" style="color: white;"></span></p>
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <button id="approveDocumentBtn" class="btn btn-success">Approve</button>
                                    <button id="rejectDocumentBtn" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
           .modal-content {
    border-radius: 10px;
    overflow: hidden;
}

.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
}

.modal-body {
    padding: 2rem;
}

.modal-body p {
    margin: 0;
    font-size: 1.1rem;
}

#companyLogo {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
        </style>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function openDocument(firstName, lastName, companyName, email, contactNo, compId, companyLogo) {
                $('#firstName').text(firstName);
                $('#lastName').text(lastName);               
                $('#companyName').text(companyName);
                $('#email').text(email);
                $('#companyLogo').attr('src', 'data:image/png;base64,' + companyLogo);
                $('#contactNo').text(contactNo);
                $('#compId').text(compId);
                $('#documentModal').modal('show');
            }
        
            $('#approveDocumentBtn').on('click', function () {
                var companyName = $('#companyName').text();
                var compId = $('#compId').text();
                var email = $('#email').text();
                var contactNo = $('#contactNo').text();
                var activeStatus = 'Approved';
                $.ajax({
                    type: 'POST',
                    url: '/updateStatus',
                    data: {
                        companyName: companyName,
                        email: email,
                        contactNo: contactNo,
                        compId: compId,
                        activeStatus: activeStatus
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        verifyDocument(true);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        
            $('#rejectDocumentBtn').on('click', function () {
                verifyDocument(false);
            });
        
            function verifyDocument(Approved) {
                var companyName = $('#companyName').text();
                var compId = $('#compId').text();
                var email = $('#email').text();
                var contactNo = $('#contactNo').text();
                var activeStatus = Approved ? 'Approved' : 'rejected';
                $.ajax({
                    type: 'POST',
                    url: '/updateStatus',
                    data: {
                        companyName: companyName,
                        compId: compId,
                        email: email,
                        contactNo: contactNo,
                        activeStatus: activeStatus
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        var status = Approved ? 'Approved' : 'Rejected';
                        var message = companyName + ' has been ' + status;
                        Swal.fire({
                            icon: 'success',
                            title: 'Organizer ' + status + '!',
                            text: message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            console.log(companyName + ' ' + status);
                            $('#documentModal').modal('hide');
                            window.location.href = '/AdminDashboard'; // Redirect to AdminDashboard page
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        </script>
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