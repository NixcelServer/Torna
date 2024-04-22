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

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="">Nixcel<span>Exhibition.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link text-white">About</a></li>
                <li class="nav-item"><a href="speakers.html" class="nav-link text-white">Exhibitions</a></li>
                <li class="nav-item"><a href="schedule.html" class="nav-link text-white">Schedule</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link text-white">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link text-white">Contact</a></li>
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
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold display-5">Exhibitor Registration Form</div>

                <div class="card-body">
                    <form method="POST" action="/regexhibitor" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="company_name" class="col-form-label text-md-right">Company Name <span style="color: red;">*</span></label>
                                <input id="company_name" name="company_name" type="text" class="form-control" name="company_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="unique_name" class="col-form-label text-md-right">Unique Name <span style="color: red;">*</span></label>
                                <input id="unique_name" name="unique_name" type="text" class="form-control" name="unique_name" required autofocus>
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name" class="col-form-label text-md-right">First Name <span style="color: red;">*</span></label>
                                <input id="first_name" name="first_name" type="text" class="form-control" name="first_name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label text-md-right">Last Name <span style="color: red;">*</span></label>
                                <input id="last_name" name="last_name" type="text" class="form-control" name="last_name" required>
                            </div>
                           
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact_no" class="col-form-label text-md-right">Contact Number <span style="color: red;">*</span></label>
                                <input id="contact_no" name="contact_no" type="text" class="form-control" required>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-right">Email ID <span style="color: red;">*</span></label>
                                <input id="email" name="email" type="email" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-md-right">Password <span style="color: red;">*</span></label>
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="confirm_password" class="col-form-label text-md-right">Confirm Password <span style="color: red;">*</span></label>
                                <input id="confirm_password" name="confirm_password" type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right">Industry <span style="color: red;">*</span></label>
                                <select name="industry_name" class="form-control" required>
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="logo" class="col-form-label text-md-right">Upload Logo</label>
                                <input id="logo" name="logo" type="file" class="form-control-file" accept="image/*">
                            </div>
                        </div>
        
                        <br />
                        <div class="form-group row justify-content-center mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
