<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ConneXha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <style>
	@media (max-width: 768px) {
  /* CSS styles for smaller screens */
}
/* Ensure the page is 100% height */
html, body {
    height: 100%;
}

/* Navbar responsiveness */
.navbar-collapse {
    justify-content: center; /* Center the navbar items on collapse */
}

/* Hero section responsiveness */
.hero-wrap {
    height: 100vh; /* Full viewport height */
    background-size: cover; /* Ensure background image covers the entire container */
    background-position: center center; /* Center the background image */
}

/* Responsive styles for smaller screens */
@media (max-width: 768px) {
    .hero-wrap {
        height: 80vh; /* Adjust height for smaller screens */
    }
}
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

/* Smooth scroll functionality */
$('a.nav-link').on('click', function (event) {
    if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;

        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function () {
            window.location.hash = hash;
        });
    }
});

</style>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark fixed-top" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="">Conne<span>Xha.</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
	          <li class="nav-item cta mr-md-2">
				<a href="#" class="nav-link register-btn" style="background-color: #FFBE07 !important; border-color: #000 !important; color: #fff !important;" data-toggle="popover" data-placement="bottom" data-content='
                <a href="/registration" class="dropdown-item">As Organizer</a>
                <a href="/registrationE" class="dropdown-item">As Exhibitor</a>'>Register</a>
			  </li>
			  <li class="nav-item cta mr-md-2">
			  	<a href="/signin" class="nav-link" style="color: white !important;" >Sign In</a>
			  </li>
			

	        </ul>
	      </div>
	    </div>
	  </nav>

	  <script>
		$(document).ready(function () {
			$('.register-btn').popover({
				html: true
			});
		});
	</script>
    <!-- END nav -->
    
    <div id="home" class="hero-wrap js-fullheight" style="background-image: url('images/imgs/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters align-items-center justify-content-start" style="margin-top: 170px;">
				<div class="col-xl-10">
					<h1 class="mb-4" style="color: #FF6D00; font-size: 60px;">Developer <br><span style="color: #FF6D00; font-weight: bold; font-size: 60px;">Exhibition 2024</span></h1>
					<p id="event-date" class="mb-4" style="color: #FF6D00;"></p>
					<div id="timer" class="d-flex mb-3">
						<div class="time" id="dayss"></div>
						<div class="time pl-4" id="hourss"></div>
						<div class="time pl-4" id="minutess"></div>
						<div class="time pl-4" id="secondss"></div>
					</div>
					<div class="d-flex">
						<div class="time-label">Days</div>
						<div class="time-label pl-4">Hours</div>
						<div class="time-label pl-4">Minutes</div>
						<div class="time-label pl-4">Seconds</div>
					</div>
				</div>
			</div>
			<style>
				.time-label {
					color: #888;
					font-size: 14px;
					margin-right: 60px; /* Adjust the margin as needed */
				}
				.time-label pl-4 {
					color: #888;
					font-size: 14px;
					margin-right: 50px; /* Adjust the margin as needed */
				}

				
			</style>
			<script>
				// Set the target date to May 21, 2024
				const targetDate = new Date('2024-05-28T00:00:00');
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
			</script>
		</div>
	</div>	
    <footer id="contact" class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Connexha</h2>
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
                <li><a href="#" class="py-2 d-block">Schedule</a></li>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This project is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Nixcel Software</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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