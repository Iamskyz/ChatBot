<!-- signin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="video-background">
        <video autoplay loop id="myVideo">
            <source src="background video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container">
        <div class="left">
            <div class="image">
                <img src="images/nexa.png" alt="image">
            </div>
        </div>
        <div class="right">
            <div class="signin" style="margin-top: 13vh;">
                <h2>Log In</h2>
                <form method="post" action="register.php">
                    <div class="form_details">
                        <input  class="input_field" type="email" name="Email" style="width: 30vh;" required>
                        <label style="width: 6vh;" class="labelline">Email</label>
                    </div>
                    <div class="form_details">
                        <input  class="input_field" type="password" name="Password" style="width: 25vh;" required>
                        <label style="width: 10vh;" class="labelline">Password</label>
                    </div>
                    <div class="CA_button">
                        <button type="submit">Log In</button>
                    </div>
                    <p>Don't have an account? <a class="a" href="signup.php">Sign up</a></p>
                    <div class="separator">
                        <hr>
                        <span>or</span>
                        <hr>
                    </div>
                    <div class="alt_button">
                        <button style="height: 6vh; width: 50vh;" class="fb_button">
                            <img src="images/Facebook.png" alt="Facebook"> Sign in with Facebook
                        </button>
                        <button style="height: 6vh; width: 50vh;"  class="g_button">
                            <img src="images/Google.png" alt="Google"> Sign in with Google
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
