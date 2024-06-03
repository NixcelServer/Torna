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
    <link rel="icon" type="/image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Include Bootstrap CSS if not already included -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                        <div class="card card-sm"> <!-- Added card-sm class -->
                            <div class="card-header" style="background-color: #F8C471; color: black; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Audit Logs</span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Export Data
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <a class="dropdown-item" href="#" id="exportExcel">Export to Excel</a>
                                            <a class="dropdown-item" href="#" id="exportCsv">Export to CSV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Activity Name</th>
                                                <th>Activity By</th>
                                                <th>Activity Date</th>
                                                <th>Activity Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($auditlogs as $index => $log)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $log->activity_name}}</td>
                                                <td>{{ $log->username}}</td>
                                                <td>{{ $log->activity_date}}</td>
                                                <td>{{ $log->activity_time}}</td>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
$(document).ready(function () {
    $('#exportExcel').click(function (e) {
        e.preventDefault();
        exportData('xlsx');
    });

    $('#exportCsv').click(function (e) {
        e.preventDefault();
        exportData('csv');
    });
});
function exportData(format) {
    $.ajax({
        url: '/fetchauditlogs', // Update the URL to fetch audit log data
        method: 'GET',
        success: function (response) {
            if (response.success) {
                if (format === 'xlsx') {
                    // Convert data to Excel
                    console.log(response.data); // Make sure response.data has the correct structure
                    const sheet = XLSX.utils.json_to_sheet(response.data);
                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, sheet, 'Audit Log Data');
                    const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
                    saveAsFile(excelBuffer, 'Audit_Log_Data.xlsx'); // Set custom filename
                } else if (format === 'csv') {
                    // Convert data to CSV
                    const csv = convertToCsv(response.data);
                    saveAsFile(csv, 'Audit_Log_Data.csv'); // Set custom filename
                }
            } else {
                alert('Failed to fetch data.');
            }
        },
        error: function () {
            alert('Error occurred while fetching data.');
        }
    });
}
// Function to save file
function saveAsFile(buffer, fileName) {
    const blob = new Blob([buffer], { type: 'application/octet-stream' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = fileName; // Set the filename here
    a.click();
    URL.revokeObjectURL(url);
}

// Function to convert JSON data to CSV format
function convertToCsv(data) {
    const header = Object.keys(data[0]);
    const csv = [header.join(',')];
    data.forEach(row => {
        const values = header.map(key => row[key]);
        csv.push(values.join(','));
    });
    return csv.join('\n');
}
</script>
    <!--**********************************
        Scripts
    ***********************************-->  
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
    <script src="/plugins/common/common.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/gleek.js"></script>
    <script src="/js/styleSwitcher.js"></script>
    <script src="/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>
</html>
