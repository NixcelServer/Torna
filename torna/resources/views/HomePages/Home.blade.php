<!DOCTYPE html>
<html lang="en">
<head>
    <title>ConneXha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="WebsiteAssets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="WebsiteAssets/css/animate.css">
  
    <link rel="stylesheet" href="WebsiteAssets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="WebsiteAssets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="WebsiteAssets/css/magnific-popup.css">

    <link rel="stylesheet" href="WebsiteAssets/css/aos.css">

    <link rel="stylesheet" href="WebsiteAssets/css/ionicons.min.css">

    <link rel="stylesheet" href="WebsiteAssets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="WebsiteAssets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="WebsiteAssets/css/flaticon.css">
    <link rel="stylesheet" href="WebsiteAssets/css/icomoon.css">
    <link rel="stylesheet" href="WebsiteAssets/css/style.css">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
  .time-label {
    color: #888;
    font-size: 14px;
    margin-right: 10px; /* Adjust the margin as needed */
  }
  .time-label pl-4 {
    color: #888;
    font-size: 14px;
    margin-right: 10px; /* Adjust the margin as needed */
  }
  .card {
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 1, 1, 1);
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }
    .cardd {
        border-radius: 5px;
        box-shadow: 0 4px 8px rgb(137, 139, 139);
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.04); /* Scale the card up slightly on hover */
    }
    .view-document-btn {
            margin-left: 10px; /* Add space between Document: and the button */
        }
        .field-label {
            margin-right: 10px; /* Add space between label and info */
        } 
    .carousel-indicators .active{
        background-color: black !important;
    }
    /* Remove unwanted space and make footer smaller */
#contact {
    padding: 20px 0; /* Adjust as needed */
    margin-top: 0; /* Remove top margin */
    margin-bottom: 0; /* Remove bottom margin */
}

.ftco-footer {
    padding-bottom: 0; /* Remove bottom padding */
}

.ftco-footer-widget {
    margin-bottom: 0px; /* Adjust spacing between widgets */
}

.ftco-footer-widget h2 {
    font-size: 28px; /* Adjust heading size */
}

.ftco-footer-widget p {
    font-size: 14px; /* Adjust paragraph size */
}

.ftco-footer-social li {
    margin-right: 0px; /* Adjust spacing between social icons */
}

.block-23 {
    margin-bottom: 0px; /* Adjust spacing between contact info and questions */
}

.block-23 ul {
    margin-bottom: 0; /* Remove bottom margin for contact info */
}

.block-23 li {
    margin-bottom: 5px; /* Adjust spacing between contact info items */
}

.col-md-12.text-center p {
    margin-bottom: 0; /* Remove bottom margin for copyright text */
    font-size: 15px; /* Adjust copyright text size */
}
       
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light mb-3" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="">Conne<span>Xha.</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link" style="color: white;">Home</a>                    </li>
                    <li class="nav-item"><a href="#exhibition" class="nav-link" style="color: white;">Exhibition</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link" style="color: white;">Contact</a></li>
                    <li class="nav-item cta mr-md-2">
                        <a href="#" class="nav-link register-btn" style="background-color: #FFBE07 !important; border-color: #FFBE07 !important; color: #fff !important;" data-toggle="popover" data-placement="bottom" 
                        data-content='<a href="/registration" class="dropdown-item">As Organizer</a> <a href="/registrationE" class="dropdown-item">As Exhibitor</a>'>Register
                        </a>
                    </li>
                    <li class="nav-item cta mr-md-2">
                        <a href="/signin" class="nav-link" style="background-color: #FFBE07 !important; border-color: #FFBE07 !important; color: #fff !important;" >Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
</br>

    {{-- <div id="home" class="hero-wrap js-fullheight" style="background-image: url('images/imgs/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters align-items-center justify-content-start" style="margin-top: 170px;">
          <div class="col-xl-10">
            <h1 class="mb-4" style="color: #FF6D00; font-size: 60px;">Developer <br><span style="color: #FF6D00; font-weight: bold; font-size: 60px;">Exhibition 2024</span></h1>
            <p id="event-date" class="mb-4" style="color: #FF6D00;"></p>
            <div id="timer" class="d-flex mb-3">
              <div class="time" id="dayss"></div>
              <div class="time" id="hourss"></div>
              <div class="time" id="minutess"></div>
              <div class="time" id="secondss"></div>
            </div>
            <div class="d-flex">
              <div class="time-label">Days</div>
              <div class="time-label pl-4">Hours</div>
              <div class="time-label pl-4">Minutes</div>
              <div class="time-label pl-4">Seconds</div>
            </div>
          </div>
        </div>
       
        
      </div>
    </div> --}}
    {{-- <script>
      // Set the target date to May 21, 2024
      const targetDate = new Date('2024-06-28T00:00:00');
      // Update the event date dynamically
      const eventDateElement = document.getElementById('event-date');
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      const startDate = targetDate.toLocaleDateString('en-US', options);
      const endDate = new Date(targetDate);
      endDate.setDate(endDate.getDate() + 3);
      const formattedEndDate = endDate.toLocaleDateString('en-US', options);
      eventDateElement.innerHTML = `${startDate} - ${formattedEndDate}. Pimpri-Chinchwad, Pune`;
    
      function updateTimer() {
        // Get the current date and time
        const now = new Date();
    
        // Calculate the time difference in milliseconds
        const diff = targetDate.getTime() - now.getTime();
    
        // Ensure the countdown doesn't show negative values
        if (diff <= 0) {
          document.getElementById('timer').innerHTML = '<div class="time">00</div><div class="time pl-4">00</div><div class="time pl-4">00</div><div class="time pl-4">00</div>';
          return; // Stop the countdown
        }
    
        // Convert milliseconds to days, hours, minutes, and seconds
        const dayss = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hourss = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutess = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secondss = Math.floor((diff % (1000 * 60)) / 1000);
    
        // Update the timer elements in the HTML
        document.getElementById('dayss').innerText = padZero(dayss);
        document.getElementById('hourss').innerText = padZero(hourss);
        document.getElementById('minutess').innerText = padZero(minutess);
        document.getElementById('secondss').innerText = padZero(secondss);
      }
    
      // Helper function to pad zeros for single-digit numbers
      function padZero(num) {
        return num.toString().padStart(2, '0');
      }
    
      // Update the timer every second
      setInterval(updateTimer, 1000);
    
      // Initial call to update the timer immediately
      updateTimer();
    </script> --}}
    {{-- <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="carddd">
                <div class="card-body">
                    <h4 class="card-title text-center">ConneXha Exhibitions</h4>
                    <div class="bootstrap-carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($upcomingExs as $key => $upcomingEx)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-7 col-sm-10 mb-2">
                                            <div class="cardd">
                                                @if($upcomingEx->company_logo)
                                                <img src="data:image/png;base64,{{ $upcomingEx->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title text-center" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                                        {{ $upcomingEx->exhibition_name }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carouselExampleIndicators"
                                data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
<div id="exhibition" class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="card-header text-center" style="background-color: #F8C471; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;">Upcoming Exhibitions List</h4>
                <br/>
                <div class="row">
                    @foreach($upcomingExs as $key => $upcomingEx)
                    <div class="col-lg-4 col-md-7 col-sm-10 mb-4">
                        <div class="card">
                            @if($upcomingEx->company_logo)
                            <img src="data:image/png;base64,{{ $upcomingEx->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 100%; height: 150px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title" style="background-color: #FFBE07; padding: 0.2em 0.4em; border-radius: 4px; color: black;">
                                    {{ $upcomingEx->exhibition_name }}
                                </h5>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt mr-2"></i>
                                            <span class="font-weight-bold field-label">Date:</span>
                                            <span>{{ \Carbon\Carbon::parse($upcomingEx->ex_from_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($upcomingEx->ex_to_date)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-clock mr-2"></i>
                                            <span class="font-weight-bold field-label">Time:</span>
                                            <span>{{ $upcomingEx->start_time }} - {{ $upcomingEx->end_time }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            <span class="font-weight-bold field-label">Venue:</span>
                                            <span>{{ $upcomingEx->venue }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-globe mr-2"></i>
                                            <span class="font-weight-bold field-label">Website:</span>
                                            <a href="{{ $upcomingEx->exhibition_website }}" target="_blank">{{ $upcomingEx->exhibition_website }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-external-link-alt mr-2"></i>
                                            <span class="font-weight-bold field-label">Register:</span>
                                            <a href="{{ $upcomingEx->registration_url }}" target="_blank">{{ $upcomingEx->registration_url }}</a>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-alt mr-2" data-toggle="tooltip" data-placement="top" title="Document"></i>
                                            <span class="font-weight-bold field-label">Document:</span>
                                            <button class="btn btn-sm btn-success view-document-btn" data-toggle="modal" data-target="#documentModal" title="Document">
                                                <i class="fas fa-file-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-warning mb-1" onclick="showRegisterAlert()">Participate</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>      
    </div>
</div>
<script>
    function showRegisterAlert() {
        Swal.fire({
            title: 'Hey!',
            text: 'Please Register to participate in this exhibition',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes! Register',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/registrationE'; // Redirect to /registrationE
            }
        });
    }
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>

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
                <embed src="data:application/pdf;base64,{{ $upcomingEx->attach_document }}" type="application/pdf" width="100%" height="500px" />
            </div>
        </div>
    </div>
</div>

    <footer id="contact" class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">ConneXha.</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Speakers</a></li>
                            <li><a href="#" class="py-2 d-block">Shcedule</a></li>
                            <li><a href="#" class="py-2 d-block">Events</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Career</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Hinjawadi Rd, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra 411057</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">02066668009</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@connexha.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This product is made with Nixcel Software Solution by <a href="" target="_blank">Developer Team</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <script src="WebsiteAssets/js/jquery.min.js"></script>
    <script src="WebsiteAssets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="WebsiteAssets/js/popper.min.js"></script>
    <script src="WebsiteAssets/js/bootstrap.min.js"></script>
    <script src="WebsiteAssets/js/jquery.easing.1.3.js"></script>
    <script src="WebsiteAssets/js/jquery.waypoints.min.js"></script>
    <script src="WebsiteAssets/js/jquery.stellar.min.js"></script>
    <script src="WebsiteAssets/js/owl.carousel.min.js"></script>
    <script src="WebsiteAssets/js/jquery.magnific-popup.min.js"></script>
    <script src="WebsiteAssets/js/aos.js"></script>
    <script src="WebsiteAssets/js/jquery.animateNumber.min.js"></script>
    <script src="WebsiteAssets/js/bootstrap-datepicker.js"></script>
    <script src="WebsiteAssets/js/jquery.timepicker.min.js"></script>
    <script src="WebsiteAssets/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="WebsiteAssets/js/google-map.js"></script>
    <script src="WebsiteAssets/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html: true
            });
        });
    </script>
</body>
</html>
