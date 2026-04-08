<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CISC3003 - DC328563 RACHEL</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Join Us</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Use Your Email to signup</span>
                <input type="text" placeholder="Enter Your Full Name" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button>REGISTER</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Log In</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Use Your Account to sign in</span>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button>LOG IN</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Hello , Again</h1>
                    <img src="images/website_7376495.png">
                    <p>Login to stay connected with us</p>
                    <button class="ghost" id="signIn">SIGN IN</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome!</h1>
                    <img src="images/unsecure_10399884.png">
                    <p>Login to stay connected with us</p>
                    <button class="ghost" id="signUp">REGISTER</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        CISC3003 Web Programming: DC328563 RACHEL 2026
    </footer>
    <script src="js/script.js"></script>
</body>
</html>