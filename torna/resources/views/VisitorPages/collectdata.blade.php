<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-name" content="quixlab">
    <title>ConneXha</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"></circle>
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header" style="background-color: #FFBE07; height: 63px;">
            <div class="brand-logo">
                <a href="/upcomingExhibitions">
                    <b class="logo-abbr"><img src="images/logo.png" alt="Logo"></b>
                    <span class="logo-compact"><img src="images/logo-compact.png" alt="Compact Logo"></span>
                    <span class="brand-title" style="color: #ffffdb; font-size: 20px; font-family: sans-serif;">
                        Conne<span style="font-family: 'Bebas Neue', sans-serif; font-weight: 700; color: #ffbe07;">Xha.</span>
                    </span>
                </a>
            </div>
        </div>
        <div class="header" style="background-color: #FFBE07; height: 63px;">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/images/user/1.png" height="40" width="40" alt="User">
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
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/upcomingExhibitions" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/companysetupform" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Company Details</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
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
                        <a href="/products" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Products/Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="/documents" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Documents</span>
                        </a>
                    </li>
                    <li>
                        <a href="/notificationSetting" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Notification Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">
                                <span style="color: black;">{{ $exhibition->exhibition_name }} Visitors List</span>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Export Data
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="exportDropdown">
                                        <a class="dropdown-item" href="#" id="exportExcel" data-id="{{ $exhibition->encExId }}">Export to Excel</a>
                                        <a class="dropdown-item" href="#" id="exportCsv" data-id="{{ $exhibition->encExId }}">Export to CSV</a>
                                        <form action="/sendemailwithexcel" method="POST" id="sendEmailForm">
                                            @csrf
                                            <input type="hidden" name="exhibitionId" value="{{ $exhibition->encExId }}">
                                            <button type="submit" class="dropdown-item" id="sendEmailButton">Send by Email</button>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Visitor Name</th>
                                            <th>Visitor Contact No</th>
                                            <th>Visitor Email</th>
                                            <th>Service</th>
                                            @if ($showActionColumn)
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitors as $index => $visitor)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $visitor->name }}</td>
                                            <td>{{ $visitor->contact_no }}</td>
                                            <td>{{ $visitor->email }}</td>
                                            <td>{{ $visitor->service_name }}</td>
                                            @if ($showActionColumn)
                                            <td>
                                                <a href="/sendmail/{{ $visitor->encVisitorId }}" class="btn btn-primary btn-sm">Send Email</a>
                                            </td>
                                            @endif
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#sendEmailButton').click(function(e) {
    e.preventDefault();
    const exhibitionId = "{{ $exhibition->encExId }}";
    const exhibitionName = "{{ $exhibition->exhibition_name }}";
    // Show loader
    Swal.fire({
        title: 'Please wait...',
        text: 'Sending email, please wait for a few seconds...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });
    $.ajax({
        url: `/fetchvisitordata/${exhibitionId}`,
        method: 'GET',
        success: function(response) {
            if (response.success) {
                const sheet = XLSX.utils.json_to_sheet(response.data);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, sheet, 'Visitor Data');
                const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
                const blob = new Blob([excelBuffer], { type: 'application/octet-stream' });
                const formData = new FormData();
                formData.append('excelFile', blob, `Visitor Data - ${exhibitionName}.xlsx`);
                formData.append('exhibitionName', exhibitionName);
                $.ajax({
                    url: '/sendemailwithexcel',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Close loader and show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Mail sent!',
                            text: 'Mail sent successfully to your registered email!',
                            showConfirmButton: false,
                            timer: 3000 // 3 seconds
                        });
                    },
                    error: function() {
                        // Close loader and show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error occurred while sending email.',
                            showConfirmButton: true
                        });
                    }
                });
            } else {
                // Close loader and show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Failed to fetch data.',
                    showConfirmButton: true
                });
            }
        },
        error: function() {
            // Close loader and show error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error occurred while fetching data.',
                showConfirmButton: true
            });
        }
    });
});
    });
</script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#exportExcel').click(function(e) {
                    e.preventDefault();
                    const exhibitionId = $(this).data('id');
                    const exhibitionName = "{{ $exhibition->exhibition_name }}";
                    exportData('xlsx', exhibitionId, exhibitionName);
                });

                $('#exportCsv').click(function(e) {
                    e.preventDefault();
                    const exhibitionId = $(this).data('id');
                    const exhibitionName = "{{ $exhibition->exhibition_name }}";
                    exportData('csv', exhibitionId, exhibitionName);
                });
            });
            function exportData(format, exhibitionId, exhibitionName) {
                $.ajax({
                    url: `/fetchvisitordata/${exhibitionId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            if (format === 'xlsx') {
                                const sheet = XLSX.utils.json_to_sheet(response.data);
                                const wb = XLSX.utils.book_new();
                                XLSX.utils.book_append_sheet(wb, sheet, 'Visitor Data');
                                const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
                                saveAsFile(excelBuffer, `${exhibitionName} Visitors Data.xlsx`);
                            } else if (format === 'csv') {
                                const csv = convertToCsv(response.data);
                                saveAsFile(csv, `${exhibitionName} Visitors Data.csv`);
                            }
                        } else {
                            alert('Failed to fetch data.');
                        }
                    },
                    error: function() {
                        alert('Error occurred while fetching data.');
                    }
                });
            }
            function saveAsFile(buffer, fileName) {
                const blob = new Blob([buffer], { type: 'application/octet-stream' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = fileName;
                a.click();
                URL.revokeObjectURL(url);
            }
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
        <script src="/plugins/common/common.min.js"></script>
        <script src="/js/custom.min.js"></script>
        <script src="/js/settings.js"></script>
        <script src="/js/gleek.js"></script>
        <script src="/js/styleSwitcher.js"></script>
        <script src="/plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="/plugins/circle-progress/circle-progress.min.js"></script>
        <script src="/plugins/d3v3/index.js"></script>
        <script src="/plugins/topojson/topojson.min.js"></script>
        <script src="/plugins/datamaps/datamaps.world.min.js"></script>
        <script src="/plugins/raphael/raphael.min.js"></script>
        <script src="/plugins/morris/morris.min.js"></script>
        <script src="/plugins/moment/moment.min.js"></script>
        <script src="/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <script src="/plugins/chartist/js/chartist.min.js"></script>
        <script src="/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
        <script src="/js/dashboard/dashboard-1.js"></script>
        <script src="/plugins/tables/js/jquery.dataTables.min.js"></script>
        <script src="/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    </div>
</body>
</html>
