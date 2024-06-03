<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="card-header text-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">Participated Exhibitions List</h4>
                            <div class="card-body">
                                <br/>
                                <div class="row">
                                    @foreach($participatedExs as $key => $participatedEx)
                                    <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                                        <div class="cardE">
                                            @if($participatedEx->exDetails->company_logo)
                                            <img src="data:image/png;base64,{{ $participatedEx->exDetails->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                                    {{ $participatedEx->exDetails->exhibition_name }}
                                                </h5>
                                                
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-alt mr-2"></i>
                                                            <span class="font-weight-bold">Date:</span>
                                                        </div>
                                                        <div>
                                                            <span>{{ \Carbon\Carbon::parse($participatedEx->exDetails->ex_from_date)->format('d M Y') }}</span>
                                                            <span class="mx-1">-</span>
                                                            <span>{{ \Carbon\Carbon::parse($participatedEx->exDetails->ex_to_date)->format('d M Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-clock mr-2"></i>
                                                            <span class="font-weight-bold">Time:</span>
                                                        </div>
                                                        <div>
                                                            <span>{{ $participatedEx->exDetails->start_time }}</span>
                                                            <span class="mx-2">-</span>
                                                            <span>{{ $participatedEx->exDetails->end_time }}</span>
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
                                                            <span>{{ $participatedEx->exDetails->venue }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-globe mr-2"></i>
                                                            <span class="font-weight-bold">Website:</span>
                                                        </div>
                                                        <div>
                                                            <a href="{{ $participatedEx->exDetails->exhibition_website }}" target="_blank">{{ $participatedEx->exDetails->exhibition_website }}</a>
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
                                                            <a href="{{ $participatedEx->exDetails->registration_url }}" target="_blank">{{ $participatedEx->exDetails->registration_url }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-file-alt mr-2"></i>
                                                            <span class="font-weight-bold">Document:</span>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-success view-document-btn" data-toggle="modal" data-target="#documentModalview">View Document</button>
                                                        </div>                                                                                                             
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                @if($participatedEx->emailServiceEnabled)
                                                    <a href="{{ route('visitorsdetails', ['id' => $participatedEx->encParticipationId]) }}" class="btn btn-sm mb-1 btn-outline-primary" target="_blank">Generate URL</a>
                                                    <button class="btn btn-sm mb-1 btn-outline-secondary generate-qr-btn" data-id="{{ $participatedEx->encParticipationId }}" onclick="generateQRCode(this)">Generate QR Code</button>
                                                @else
                                                    <button class="btn btn-sm mb-1 btn-outline-primary" disabled title="First_Select_Notification_Method!" data-toggle="tooltip">Generate URL</button>
                                                    <button class="btn btn-sm mb-1 btn-outline-secondary" disabled title="First_Select_Notification_Method!" data-toggle="tooltip">Generate QR Code</button>
                                                @endif
                                                
                                                <button class="btn btn-sm mb-1 btn-outline-info" onclick="openDocument('{{ $participatedEx->encExId }}', {{ json_encode($participatedEx->selectedOptions ?? []) }})">Notify By</button>
                                                <a href="{{ route('collectdata', ['id' => $participatedEx->encParticipationId]) }}" class="btn btn-sm mb-1 btn-outline-warning">Collect Data</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="documentModalview" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
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
                        <embed src="data:application/pdf;base64,{{ $participatedEx->attach_document}}" type="application/pdf" width="100%" height="500px" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="documentModalLabel">Notification Methods</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <body>
                                <h3 class="mb-3">Select notification method:</h3>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="notifyOption" value="email" id="emailImmediateOption">
                                    <label class="form-check-label" for="emailOption">Email (Immediate After Registration)</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="notifyOption" value="emailAfter" id="emailAfterOption">
                                    <label class="form-check-label" for="emailOption">Email (After Exhibition)</label>
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
                                                    // showErrorPopup(); // Show error popup if backend call fails
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
                                function generateQRCode(button) {
                                    // Get the data-id attribute from the button
                                    const exId = button.getAttribute('data-id');
                                    // Get the current host and port dynamically
                                    const host = window.location.hostname;
                                    const port = window.location.port ? `:${window.location.port}` : '';
                                    const protocol = window.location.protocol;
                            
                                    // Construct the dynamic URL
                                    const dynamicUrl = `${protocol}//${host}${port}/visitordetails/${exId}`;
                            
                                    // Generate the QR code using qrcode-generator library
                                    const qr = qrcode(0, 'M');
                                    qr.addData(dynamicUrl);
                                    qr.make();
                                    // Get the QR code SVG
                                    const svg = qr.createSvgTag();
                                    
                                    // Adjust the SVG size
                                    const parser = new DOMParser();
                                    const svgDoc = parser.parseFromString(svg, "image/svg+xml");
                                    const svgElement = svgDoc.querySelector("svg");
                                    svgElement.setAttribute("width", "300");
                                    svgElement.setAttribute("height", "300");
                                    const updatedSvg = new XMLSerializer().serializeToString(svgElement);
                            
                                    // Create a new tab
                                    const newTab = window.open('', '_blank');
                                    newTab.document.write(`
                                        <html>
                                            <head>
                                                <title>QR Code</title>
                                                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                                            </head>
                                            <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar" style="background-color: #FFBE07; height: 53px;">
                                             <div class="container">
                                              <div class="navbar-brand mx-auto" style="font-weight: bold;">Welcome To NixcelSoft !</div>
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                                                  aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                                                   <span class="oi oi-menu"></span> Menu
                                               </button>
                                              </div>
                                            </nav>
                                            <body>
                                                <div class="container text-center" style="margin-top: 30px;">
                                                    <h3>QR Code for {{ $participatedEx->exDetails->exhibition_name }}</h3>
                                                    <div>${updatedSvg}</div>
                                                    <button id="download-btn" class="btn btn-success" style="margin-top: 20px;">Download QR Code</button>
                                                </div>
                                            </body>
                                        </html>
                                    `);
                            
                                    // Add download functionality to the button in the new tab
                                    newTab.document.getElementById('download-btn').addEventListener('click', function() {
                                        // Create a temporary link element to trigger the download
                                        const link = newTab.document.createElement('a');
                                        link.href = 'data:image/svg+xml;base64,' + btoa(updatedSvg);
                                        link.download = 'qr-code.svg';
                                        link.click();
                                    });
                                }
                            </script>
                            
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
            function openDocument(encExId,selectedOptions ) {
                document.getElementById('encExId').value = encExId;

                $('input[name="notifyOption"]').prop('checked', false);

                selectedOptions.forEach(option => {
            document.getElementById(option + 'Option').checked = true;
        });
                
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
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Add this script in your HTML file, preferably at the end before </body> tag -->
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