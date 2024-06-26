<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nixcel Exhibition</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

{{-- form validations scripts  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var contactNoInput = document.getElementById('contact_no');
        var contactError = document.getElementById('contactError');

        contactNoInput.addEventListener('input', function() {
            var contactNo = contactNoInput.value.trim();

            if (contactNo.length !== 10 || isNaN(contactNo)) {
                contactError.textContent = 'Contact number should be 10 digits long and contain only numbers.';
                contactNoInput.classList.add('is-invalid');
            } else {
                contactError.textContent = '';
                contactNoInput.classList.remove('is-invalid');
            }
        });
    });


    $(document).ready(function() {
        $('#email').on('input', function() {
            var email = $(this).val();
            if (!isValidEmail(email)) {
                $('#emailError').text('Please enter a valid email address.');
                $(this).addClass('is-invalid');
            } else {
                $('#emailError').text('');
                $(this).removeClass('is-invalid');
            }
        });

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex for valid email format
            return emailRegex.test(email);
        }
    });
</script>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <div class="navbar-brand mx-auto">Welcome To NixcelSoft !</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
    
            
        </div>
    </nav>
    

<style>
    .required-field::after {
        content: "*";
        color: red;
        margin-left: 5px;
    }
</style>

<div class="card mb-3">
    <div class="card-header text-center">
        {{-- Featured --}}
    </div>
    <div class="card-body text-center">
        <h5 class="card-title">Exhibition Details</h5>
       
        <p class="card-text">Exhibition Name: {{ $participatedEx->exDetails->ex_name }}</p>

        @if($participatedEx->exDetails->company_logo)
    <img src="data:image/png;base64,{{ $participatedEx->exDetails->company_logo }}" class="card-img-top" alt="Company Logo" style="width: 50%; height: 250px; object-fit: cover;">
    @else
        <p>No company logo available</p>
    @endif    </div>
    
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header text-center" style="background-color: #c2c2c2; font-family: Arial, sans-serif; font-size: 18px;  font-weight: bold;">Visitor Registration Form</h4>

                <div class="card-body">
                    <form method="POST" action="/regvisitor">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="visitor_name" class="col-form-label text-md-right required-field">Visitor Name</label>
                                <input id="visitor_name" name="visitor_name" type="text" class="form-control" required>
                                <input type="hidden" name= "encCompId" value="{{ $participatedEx->encCompId }}">
                                <input type="hidden" name = "encExId" value="{{ $participatedEx->encExId }}">
                            </div>

                            <div class="col-md-6">
                                <label for="contact_no" class="col-form-label text-md-right required-field">Visitor Contact No</label>
                                <input id="contact_no" name="contact_no" type="text" class="form-control" required>
                                <small id="contactError" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right required-field">Visitor Email Id</label>
                                <input id="email" name="email" type="email" class="form-control" required>
                                <small id="emailError" class="text-danger"></small>
                            </div>

                            <div class="col-md-6">
                                <label for="services" class="col-form-label text-md-right required-field">Select Services</label>
                                <select id="services" name="services" class="form-control" required>
                                    <option value="">Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->encServiceId }}">{{ $service->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
<br />
                        <div class="form-group row justify-content-center mb-2">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('.register-btn').popover({
            html: true
        });
    });
</script>
<!-- END nav -->

<!-- Loader -->
{{-- <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div> --}}

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

</body>
</html>
