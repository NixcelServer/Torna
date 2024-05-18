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

    
</head>
<body>
<!-- Loader -->
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
<style>
    /* Custom styles for the Register and Sign In buttons */
    .register-btn,
    .nav-link[href="/signin"] {
        background-color: #FFBE07 !important; /* Set background color to #FFBE07 */
        border-color: #FFBE07 !important; /* Set border color to #FFBE07 */
    }

    /* Hover styles */
.register-btn:hover,
.nav-link[href="/signin"]:hover {
    background-color: #FFBE07 !important; /* Set background color to white on hover */
    border-color: #FFBE07 !important;     /* Set border color to white on hover */
    color: #FFFFFF !important;            /* Set text color to #FFBE07 on hover */
}
</style>


    {{-- @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif --}}

<nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-light ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Nixcel<span>Exhibition.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link text-black">Home</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-black">About</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-black">Exhibitions</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-black">Schedule</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-black">Blog</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-black">Contact</a></li>
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
        margin-left: 5px;
    }
    .containerinbody {
    max-width: 800px; /* Set the maximum width of the container */
    margin-top: 5px; /* Adjust top margin as needed */
    margin-bottom: 10px; 
   
    margin-left: 10; /* Remove any default left margin */

}

</style>

{{-- Form validation-scripts --}}
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
</script>
{{-- <div class="hero-wrap js-fullheight" style="background-image: url('images/imgs/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container " >
    
  </div>
</div> --}}
<div class="container mt-5">
    <div class="containerinbody">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center font-weight-bold display-5">Organizer Registration Form</div>

                <div class="card-body">
                    <form id="registrationForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">             
                            <div class="col-md-6">
                                <label for="first_name" class="col-form-label text-md-right required-field">First Name</label>
                                <input id="first_name" name="first_name" type="text" class="form-control" name="first_name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="col-form-label text-md-right required-field">Last Name</label>
                                <input id="last_name" name="last_name" type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact_no" class="col-form-label text-md-right required-field">Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="width: 50px;">+91</span>
                                    </div>
                                    <input id="contact_no" name="contact_no" type="text" class="form-control" required>
                                </div>
                                <small id="contact_noError" class="text-danger"></small>
                            </div>                           
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right required-field">Email ID</label>
                                <input id="email" name="email" type="email" class="form-control" required>
                               <small id="emailError" class="text-danger"></small>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-md-right required-field">Password</label>
                                <input id="password" name="password" type="password" class="form-control" required>
                                <small id="passwordError" class="text-danger"></small>
                            </div>                      
                            <div class="col-md-6">
                                <label for="confirm_password" class="col-form-label text-md-right required-field">Confirm Password</label>
                                <input id="confirm_password" name="confirm_password" type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="company_name" class="col-form-label text-md-right required-field">Company Name</label>
                                <input id="company_name" name="company_name" type="text" class="form-control" name="company_name" required>
                                <small id="company_nameError" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="company_logo" class="col-form-label text-md-right">Upload Company Logo</label>
                                <input id="company_logo" name="company_logo" type="file" class="form-control-file" accept="image/*">
                                
                            </div>
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
         // Log serialized form data
       

        // Add event listener to form submission
        $('#registrationForm').on('submit', function (e) {
            console.log("Form submission event listener triggered!"); // L
            e.preventDefault(); // Prevent the form from submitting normally

            // Show the loader
            $('#loader').show();
         console.log("Form submission triggered!");
         console.log("Serialized form data:", $(this).serialize());

            // Submit the form using AJAX
            $.ajax({
                type: 'POST',
                url: '/regorganizer', // Update the URL to your form submission endpoint
                data: new FormData($(this)[0]), // Use FormData to handle multipart/form-data
    processData: false, // Prevent jQuery from automatically processing data
    contentType: false, // Prevent jQuery from setting contentType
    enctype: 'multipart/form-data', 
                success: function (response) {
                    // Check if the registration was successful
                    if (response.success) {
                        $('#loader').hide();
                        console.log("AJAX request successful!");
                console.log("Response: ", response);
                        // Show the success message
                        console.log("Request Data: ", response.data);
                        showRegistrationSuccessMessage();
                        window.location.href = '/';                        // Optionally, you can redirect the user to another page after success
                        // window.location.href = '/success-page'; // Update the URL as needed
                    } else {
                        $('#loader').hide();
                        // Handle errors or other responses here
                        console.log(response.message);
                        console.log("Registration error: ", response.message);
                    }
                },
                error: function (error) {
                    $('#loader').hide();
                    console.log("AJAX request failed!");
                
                var errors = error.responseJSON.errors; // Make sure 'errors' is extracted correctly
    

                $.each(errors, function(field, messages) {
                    // Construct the ID of the error message element
                
                    var errorMessageId = field + 'Error';

                    // Display the first error message for the field
                    $('#' + errorMessageId).text(messages[0]);
                });

                }
            });
        });

        function showRegistrationSuccessMessage() {
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'Your registration has been successfully submitted.',
                showConfirmButton: false,
                timer: 4000 // 2 seconds
            });
        }
    });
</script>



{{-- <script>
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
</script> --}}
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
