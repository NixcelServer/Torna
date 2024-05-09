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
<body>
    <div id="loader" class="loader">
        <div class="spinner"></div>
        <div class="loading-text">Registration Loading! Please wait a few seconds...</div>
    
    </div>
    <style>
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff; /* Full white background */
            z-index: 9999;
            display: none;
        }
    
        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            border: 5px solid transparent;
            border-top-color: rgba(99, 168, 59, 0.925); /* Change the color as needed */
            animation: spin 1s linear infinite;
        }
    
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    
        .loading-text {
            position: fixed;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000000;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>

{{-- validation-scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#first_name, #last_name').on('input', function() {
            var val = $(this).val();
            $(this).val(val.toUpperCase());
        });
    });


    $(document).ready(function() {
            $('#contact_no').on('input', function() {
                var val = $(this).val();
                if (val.length !== 10 || isNaN(val)) {
                    $('#contactError').text('Contact number should be 10 digits long and contain only numbers.');
                    $(this).addClass('is-invalid');
                } else {
                    $('#contactError').text('');
                    $(this).removeClass('is-invalid');
                }
            });
        });


        $(document).ready(function() {
            $('#password').on('input', function() {
                var val = $(this).val();
                if (val.length < 8) {
                    $('#passwordError').text('Password should be at least 8 characters long.');
                    $(this).addClass('is-invalid');
                } else if (!/[A-Z]/.test(val) || !/[a-z]/.test(val) || !/\d/.test(val)) {
                    $('#passwordError').text('Password should contain at least one uppercase letter, one lowercase letter, and one digit.');
                    $(this).addClass('is-invalid');
                } else {
                    $('#passwordError').text('');
                    $(this).removeClass('is-invalid');
                }
            });
        });


        
    document.addEventListener("DOMContentLoaded", function() {
        const emailInput = document.getElementById('email');
        //emailError.textContent = 'Only company domain emails are allowed.';
        emailInput.addEventListener('input', function() {
            const email = this.value.trim().toLowerCase();
            const isGmail = email.endsWith('@gmail.com');

            if (isGmail) {
                this.setCustomValidity("Gmail addresses are not allowed, Only company domain emails are allowed.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

</script>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="">Nixcel<span>Exhibition.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">About</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">Exhibitions</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">Schedule</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">Blog</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">Contact</a></li>
                <li class="nav-item cta mr-md-2">
                    <a href="#" class="nav-link register-btn" data-toggle="popover" data-placement="bottom"
                       data-content='
                            <a href="/organizerform" class="dropdown-item">As Organizer</a>
                            <a href="/exhibitorform" class="dropdown-item">As Exhibitor</a>
                        '>Register</a>
                </li>
                <li class="nav-item cta mr-md-2">
                    <a href="/signin" class="nav-link">Sign In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .required-field::after {
        content: "*";
        color: red;
        margin-left: 4px;
    }
    .containerinbody {
    max-width: 900px; /* Set the maximum width of the container */
    margin-top: 5px; /* Adjust top margin as needed */
    margin-bottom: 10px; 
   
    margin-left: 10; /* Remove any default left margin */

}
</style>
<div class="container mt-5">
    <div class="containerinbody">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center font-weight-bold display-5">Exhibitor Registration Form</div>

                <div class="card-body">
                    <form enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="first_name" class="col-form-label text-md-right">First Name <span style="color: red;">*</span></label>
                                <input id="first_name" name="first_name" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="col-form-label text-md-right">Last Name <span style="color: red;">*</span></label>
                                <input id="last_name" name="last_name" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="contact_no" class="col-form-label text-md-right required-field">Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="width: 50px;">+91</span>
                                    </div>
                                    <input id="contact_no" name="contact_no" type="text" class="form-control" required>
                                </div>
                                <small id="contactError" class="text-danger"></small>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_name" class="col-form-label text-md-right">Company Name <span style="color: red;">*</span></label>
                                    <input id="company_name" name="company_name" type="text" class="form-control" required>
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">Email ID <span style="color: red;">*</span></label>
                                    <input id="email" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label text-md-right">Industry <span style="color: red;">*</span></label>
                                    <select name="industry_name" class="form-control" required>
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_logo" class="col-form-label text-md-right">Upload Logo</label>
                                    <input id="logo" name="company_logo" type="file" class="form-control-file" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">Password <span style="color: red;">*</span></label>
                                    <input id="password" name="password" type="password" class="form-control" required>
                                    <small id="passwordError" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="confirm_password" class="col-form-label text-md-right">Confirm Password <span style="color: red;">*</span></label>
                                    <input id="confirm_password" name="confirm_password" type="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            
                        </div>

                        <div class="row">
                            
                            
                        </div>
        
                        <br />
                        <div class="form-group row justify-content-center mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary register-btnn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize popover with trigger event set to 'click'
        $('.register-btnn').popover({
            html: true,
            trigger: 'click' // Specify trigger event
        });

        // Add event listener to form submission
        $('form').on('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting normally

            $('#loader').show();

            // Submit the form using AJAX
            $.ajax({
    type: 'POST',
    url: '/regexhibitor', // Update the URL to your form submission endpoint
    data: new FormData($(this)[0]), // Use FormData to handle multipart/form-data
    processData: false, // Prevent jQuery from automatically processing data
    contentType: false, // Prevent jQuery from setting contentType
    enctype: 'multipart/form-data', // Specify the enctype directly
    success: function (response) {
        // Check if the registration was successful
        if (response.success) {
            $('#loader').hide();
            // Show the success message
            showRegistrationSuccessMessage();
            window.location.href = '/'; // Optionally, you can redirect the user to another page after success
            // window.location.href = '/success-page'; // Update the URL as needed
        } else {
            $('#loader').hide();
            // Handle errors or other responses here
            console.log(response.message);
        }
    },
    error: function (error) {
        $('#loader').hide();
        console.log(error);
    }
});

        });

        function showRegistrationSuccessMessage() {
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'Your registration has been successfully submitted.',
                showConfirmButton: false,
                timer: 2000 // 2 seconds
            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.register-btn').popover({
            html: true
        });
    });
</script>
<!-- END nav -->

<!-- Loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

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
