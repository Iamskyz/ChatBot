<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
                <img src="images\nexa.png" alt="image">
            </div>
        </div>
        <div class="right">
            <div class="signup">
                <h2>CREATE ACCOUNT</h2>
                <form method="post" action="register.php">
                    <div class="name_fields">
                        <div class="form_details">
                            <input  class="input_field" type="text" name="First Name" style="width: 30vh;" required>
                            <label style="width: 10vh;" class="labelline">First name</label>
                        </div>
                        <div class="form_details">
                            <input  class="input_field" type="text" name="Last Name" style="width: 25vh;" required>
                            <label style="width: 10vh;" class="labelline">Last name</label>
                        </div>
                    </div>
                    <div class="form_details">
                        <input  class="input_field" type="email" name="Email" style="width: 48.7vh;" required>
                        <label style="width: 6vh;" class="labelline">Email</label>
                    </div>
                    <div class="form_details">
                        <input  class="input_field" type="password" name="Password" style="width: 29vh;" required>
                        <label style="width: 10vh;" class="labelline">Password</label>
                    </div>
                    <div class="form_details">
                        <input  class="input_field" type="password" name="Confirm Password" style="width: 29vh;" required>
                        <label style="width: 17vh;" class="labelline">Confirm Password</label>
                    </div>
                    <div class="CA_button">
                        <button type="submit">SIGN UP</button>
                    </div>
                    <p>Already have an account? <a class="a" href="signin.php">login</a></p>
                    <div class="separator">
                        <hr>
                        <span>or</span>
                        <hr>
                    </div>
                    <div class="alt_button">
                        <button style="height: 6vh; width: 50vh;" class="fb_button">
                            <img src="images/Facebook.png" alt="Facebook"> Sign up with Facebook
                        </button>
                        <button style="height: 6vh; width: 50vh;"  class="g_button">
                            <img src="images/Google.png" alt="Google"> Sign up with Google
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
