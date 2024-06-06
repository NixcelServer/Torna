<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>ConneXha</title>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #FFBE07;
}

.container {
    display: flex;
    flex-direction: column;
    width: 80%;
    max-width: 800px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



.form-container h1 {
    margin: 0 0 20px;
    font-size: 24px;
}

.form-container input[type="email"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%; /* Added width to fill the container */
    box-sizing: border-box; /* Ensures padding is included in the width */
}

.form-container button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #2DBE60;
    color: white;
    font-size: 16px;
    cursor: pointer;
    width: 100%; /* Added width to fill the container */
}

.illustration {
    background-color: #F8C471;
    width: 100%; /* Changed from 60% to 100% for mobile view */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Prevents the image from overflowing */
}

.illustration img {
    width: 100%; /* Ensure the image fills the container */
    height: auto; /* Maintain aspect ratio */
}

.disclaimer {
    margin-top: 10px;
    font-size: 12px;
    color: #555;
}

.disclaimer a {
    color: #2DBE60;
    text-decoration: none;
}

.disclaimer a:hover {
    text-decoration: underline;
}

/* DesktopView */
@media (min-width: 769px) {
    .form-container {
    background-color: white;
    padding: 20px;
    width: 40%; /* Changed from 40% to 100% for mobile view */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; /* Center align the content */
    text-align: center; /* Center align the text */
}
    .container {
        flex-direction: row;
        height: 450px;
    }

    .illustration {
        width: 60%; /* Reset width for larger screens */
        height: 100%; /* Maintain height for larger screens */
    }

    .illustration img {
        width: 100%; /* Reset image width for larger screens */
        height: 100%;
    }
}

/* mobileview */
@media (max-width: 768px) {
    .illustration {
        display: none; /* Hide the illustration for mobile view */
    }
    .form-container {
    background-color: white;
    padding: 20px;
}
}

.container {
        border-radius: 5px;
        box-shadow: 0 4px 8px rgb(24, 49, 49);
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }
    
    </style>
</head>
<body>
    <body>
        <div class="container" id="registrationContainer">
            <div class="form-container">
                <h1>Exhibitor Registration</h1>
                <form class="form-containerb" id="registrationForm" action="/registerwithmailEx" method="POST">
                    @csrf
                    <input type="email" name="email" id="emailInput" placeholder="Your email" required>
                    <button type="submit" id="registerBtn">Register for free</button>
                </form>
                <div class="disclaimer">
                    By clicking "Register for free", you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. We'll occasionally send you account related emails.
                </div>
            </div>
            <div class="illustration">
                <img src="https://images.pexels.com/photos/3316924/pexels-photo-3316924.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Illustration">
            </div>
        </div> 
    </body>   
</body>
</html>
