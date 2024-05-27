<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Nixcel Exhibition</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2DBE60;
        }
        .container {
            display: flex;
            width: 800px;
            height: 450px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: white;
            padding: 40px;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
        }
        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #2DBE60;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #28a753;
        }
        .illustration {
            background-color: #00A82D;
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .illustration img {
            width: 80%;
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
    </style>
</head>
<body>
    <body>
        <div class="container" id="registrationContainer">
            <div class="form-container">
                <h1>Verify OTP</h1>
                <form class="form-containerb" id="registrationForm" action="/verifyemailotppostEx" method="POST">
                    @csrf
                    <input type="hidden" name="email" id="otpEmail" value="{{ $email }}">
                    <input type="text" name="otp" id="otpInput" placeholder="Enter OTP" required>
                    <button type="submit" id="verifyBtn">Verify</button>
                </form>
                <div class="disclaimer">
                    By clicking "Register for free", you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. We'll occasionally send you account related emails.
                </div>
            </div>
            
            <div class="illustration">
                <img src="https://images.unsplash.com/photo-1493723843671-1d655e66ac1c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8bG9naW4lMjBwYWdlfGVufDB8fDB8fHww" alt="Illustration">
            </div>
        </div> 
    </body>
    
</body>
</html>
