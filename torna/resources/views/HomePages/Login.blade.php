<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>ConneXha</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .login-form-bg {
            background-image: url('https://images.unsplash.com/photo-1532153259564-a5f24f261f51?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }
        .login-form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form-content {
            background-color: #999999; /* Replace #cccccc with the desired shade of gray */
            padding: 5px;
            border-radius: 15px; /* Increased border radius for a smoother look */
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2); /* Increased box shadow for depth */
            width: 100%; /* Set width to 100% */
            max-width: 500px; /* Set a maximum width */
            margin: 0 auto; /* Center the form horizontally */
        }
        .exhibition-image {
            background-image: url('https://images.unsplash.com/photo-1535957998253-26ae1ef29506?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8b2ZmaWNlfGVufDB8fDB8fHww'); /* Add your exhibition image path */
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: calc(100% - 500px); /* Adjust based on your design */
        }
        
    </style>
</head>
<body class="h-100">

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
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Left side: Login Form -->
            <div class="col-lg-6 login-form-container">
                <div class="login-form-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href=""><h4>Login</h4></a>
                            <!-- Display errors here -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Session error message -->
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form class="mt-5 mb-5 login-input" method="POST" action="/login">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email ID</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                    <span id="lockoutMessage" class="text-danger"></span>
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right side: Exhibition Image -->
            <div class="col-lg-6 exhibition-image"></div>
        </div>
    </div>  
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
