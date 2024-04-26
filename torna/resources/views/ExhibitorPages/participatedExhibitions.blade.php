<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <div class="content-body">
            

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Participated Exhibitions List</h4>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Exhibition Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($participatedExs as $key => $participatedEx) 
    <tr>
        <td>{{ (int)$key + 1 }}</td>
        <td>{{ $participatedEx->exDetails->exhibition_name }}</td>
        <td>
            {{-- <button class="btn btn-sm btn-info generate-url-btn" data-id="{{ $participatedEx->tbl_ex_id }}" onclick="generateURL()">Generate URL</button> --}}
            {{-- <a class="btn btn-sm btn-info generate-url-btn" href="{{ route('visitorsdetails', ['id' => $participatedEx->encParticipationId]) }}">Generate URL</a> --}}
            <a class="btn btn-sm btn-info generate-url-btn" href="{{ route('visitorsdetails', ['id' => $participatedEx->encParticipationId]) }}" target="_blank">Generate URL</a>

            <!-- If you want a Generate QR Code button -->
            <button class="btn btn-sm btn-info generate-qr-btn" data-id="{{ $participatedEx->encParticipationId }}" onclick="generateQRCode()">Generate QR Code</button>
            <iframe id="qrCodeFrame" style="display: none;"></iframe>
            <button class="btn btn-sm btn-primary" onclick="openDocument('{{ $participatedEx->encExId }}')">
                Notify By
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
            
            
            <!-- #/ container -->
        </div>
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
                            <body>
                                <h3 class="mb-3">Select notification method:</h3>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="email" id="emailOption">
                                    <label class="form-check-label" for="emailOption">Email</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="whatsapp" id="whatsappOption">
                                    <label class="form-check-label" for="whatsappOption">WhatsApp</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="sms" id="smsOption">
                                    <label class="form-check-label" for="smsOption">SMS</label>
                                </div>
                                <div class="modal-body">
                <!-- Hidden input fields to store user ID and company ID -->
                <input type="hidden" id="encExId">

            </div>
                                <button class="btn btn-primary" onclick="parent.submitNotifyOptions(getSelectedOptions())">Submit</button>
                            
                                <!-- Bootstrap JS and custom script to get selected options -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                <!-- SweetAlert -->
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                <script>
                                    function getSelectedOptions() {
                                        const selectedOptions = [];
                                        document.querySelectorAll('input[name=notifyOption]:checked').forEach(option => {
                                            selectedOptions.push(option.value);
                                        });
                                        return selectedOptions;
                                    }
                            
                                    function submitNotifyOptions() {

                                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                                        // Get selected options when the button is clicked
                                            const selectedOptions = getSelectedOptions();

                                            
                                            // Check if any options are selected
                                            if (selectedOptions.length === 0) {
                                                // Show an error message or handle the case where no options are selected
                                                console.error('No options selected!');
                                                return;
                                            }

                                            console.log('Selected options:', selectedOptions);
                                            $.ajax({
                                                url: '/selected-options-to-notify',
                                                type: 'POST',
                                                data: JSON.stringify({ options: selectedOptions,
                                                                        encExId: $('#encExId').val(), // Get the encrypted user ID from the hidden input field
                                                                           }),
                                                contentType: 'application/json',
                                                headers: {
                                                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in request headers
                                                },
                                                success: function(response) {
                                                    console.log('Backend response:', response);
                                                    showSuccessPopup(); // Show success popup after successful backend call
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error:', error);
                                                    showErrorPopup(); // Show error popup if backend call fails
                                                }
                                            });
                                        }
                            
                                    function showSuccessPopup() {
                                        Swal.fire({
                                            title: 'Submitted!',
                                            text: 'Your notification methods have been successfully submitted.',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Redirect to the main page (replace 'main.html' with the actual page URL)
                                                window.location.href = 'participatedExhibitions';
                                            }
                                        });
                                    }
                                    function showErrorPopup() {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'There was an error submitting your notification methods.',
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            });
                                        }
                                   
                                </script>
                            </body>
                            <script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.min.js"></script>
<script>
    function generateQRCode() {
    // Get the data-id attribute from the button
    const exId = document.querySelector('.generate-qr-btn').getAttribute('data-id');

    // Generate the QR code using qrcode-generator library
    const qr = qrcode(0, 'M');
    qr.addData(`http://192.168.1.47:8000/visitordetails/${exId}`);
    qr.make();

    // Get the QR code SVG and convert it to a data URI
    const svg = qr.createSvgTag();
    const dataUri = `data:image/svg+xml;base64,${btoa(svg)}`;

    // Display the QR code in the iframe
    const iframe = document.getElementById('qrCodeFrame');
    iframe.src = dataUri;
    iframe.style.display = 'block';
}

// Function to download the QR code
function downloadQRCode() {
    const iframe = document.getElementById('qrCodeFrame');
    const svg = iframe.contentDocument.querySelector('svg');

    // Create a temporary link element to trigger the download
    const link = document.createElement('a');
    link.href = 'data:image/svg+xml;base64,' + btoa(new XMLSerializer().serializeToString(svg));
    link.download = 'qr-code.svg';
    link.click();
}

</script>


                            {{-- <body>
                                <h3 class="mb-3">Select notification method:</h3>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="email" id="emailOption">
                                    <label class="form-check-label" for="emailOption">Email</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="whatsapp" id="whatsappOption">
                                    <label class="form-check-label" for="whatsappOption">WhatsApp</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="notifyOption" value="sms" id="smsOption">
                                    <label class="form-check-label" for="smsOption">SMS</label>
                                </div>
                                <button class="btn btn-primary" id="submitBtn">Submit</button>
                            
                                <!-- Bootstrap JS and custom script to get selected options -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></s>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></scrip>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                <!-- SweetAlert -->
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#submitBtn').click(function() {
                                            const selectedOptions = getSelectedOptions();
                                            console.log('Selected all options:', selectedOptions);
                            
                                            // Make an AJAX request to the backend endpoint
                                            $.ajax({
                                                url: '/selected-options-to-notify',
                                                type: 'POST',
                                                data: JSON.stringify({ options: selectedOptions }),
                                                contentType: 'application/json',
                                                success: function(response) {
                                                    console.log('Backend response:', response);
                                                    debugger;
                                                    showSuccessPopup(); // Show success popup after successful backend call
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error:', error);
                                                    showErrorPopup(); // Show error popup if backend call fails
                                                }
                                            });
                                        });
                            
                                        function getSelectedOptions() {
                                            const selectedOptions = [];
                                            document.querySelectorAll('input[name=notifyOption]:checked').forEach(option => {
                                                selectedOptions.push(option.value);
                                            });
                                            return selectedOptions;
                                        }
                            
                                        function showSuccessPopup() {
                                            Swal.fire({
                                                title: 'Submitted!',
                                                text: 'Your notification methods have been successfully submitted.',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Redirect to the main page (replace 'main.html' with the actual page URL)
                                                    window.location.href = '/participatedExhibitions';
                                                }
                                            });
                                        }
                            
                                        function showErrorPopup() {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'There was an error submitting your notification methods.',
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            });
                                        }
                                    });
                                </script>
                            </body> --}}

                            <script>
                                function generateURL() {
    // Get the data-id attribute from the button
    const exId = document.querySelector('.generate-url-btn').getAttribute('data-id');
    
    // Construct the URL based on your route
    const url = `/nixcelsoft/exhibitionname/encid`;
    
    // Open the URL in a new tab
    window.open(url, '_blank');
}

                            </script>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            function openDocument(encExId ) {
                document.getElementById('encExId').value = encExId;
                
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
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        </script>
        <!--**********************************
            Content body end
        ***********************************-->
        <script>
            function confirmParticipation(event) {
                event.preventDefault();
        
                Swal.fire({
                    title: 'Are you Exited to participate?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, participate!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Handle participation logic here, e.g., submit a form or make an AJAX request
                        const exhibitionId = event.target.dataset.id;
                        // Example AJAX request
                        // $.post('/participate', { exhibitionId: exhibitionId }, function(response) {
                        //     // Handle response from server
                        // });
                        Swal.fire('Participation confirmed!', '', 'success');
                    }
                });
            }
        </script>
        
        
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
