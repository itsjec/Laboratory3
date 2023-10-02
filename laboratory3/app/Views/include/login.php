<?= $this->include('include/top') ?>
<?php 
session_start();

// Check if a notification message is set
if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    // Display the notification
    echo "<script>alert('$notification');</script>";
    // Remove the notification message from the session
    unset($_SESSION['notification']);
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    // Display the error message as an alert
    echo "<script>alert('$error');</script>";
    // Remove the error message from the session
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- link css -->
    <link rel="stylesheet" href="<?= base_url('assets/user/css/login_signup.css'); ?>">

    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="form sign_in">
                <h3>Sign In</h3>
                <span>or use your account</span>

                <form action="<?= site_url('auth/login'); ?>" method="post" id="form_input">
                    <?= csrf_field() ?> <!-- CSRF Protection -->
                    <div class="type">
                        <input type="text" placeholder="Username/Email" name="emailOrUsername" id="email" required>
                    </div>
                    <div class="type">
                        <input type="password" placeholder="Password" name="password" id="password" oninput="toggleEyeSlashIcon(this)" required>
                        <i class="uil uil-eye-slash" style="visibility: hidden;"></i>
                    </div>
                    <input type="submit" value="Sign In" name="submit" class="btn bkg">
                </form>
            </div>

        
            <div class="form sign_up">
                <h3>Sign Up</h3>
                <span>or use your email for register</span>

                <form action="<?= site_url('auth/register'); ?>" method="post" id="form_input">
                    <?= csrf_field() ?> <!-- CSRF Protection -->
                    <div class="type">
                        <input type="text" name="username2" placeholder="Username" id="name" required>
                    </div>
                    <div class="type">
                        <input type="email" name="email2" placeholder="Email" id="email" required>
                    </div>
                    <div class="type">
                        <input type="password" name="password2" placeholder="Password" id="password" oninput="toggleEyeSlashIcon(this)" required>
                        <i class="uil uil-eye-slash" style="visibility: hidden;"></i>
                    </div>
                    <input type="submit" name="submit2" value="Sign Up" class="btn bkg">
                </form>
            </div>
        </div>

        <div class="overlay">
            <div class="page page_signIn">
                <h3>Welcome Back!</h3>
                <p>To keep with us, please log in with your personal info</p>

                <button class="btn btnSign-in" id="signInBtn">Sign Up <i class="bi bi-arrow-right"></i></button>
            </div>

            <div class="page page_signUp">
                <h3>Hello Friend!</h3>
                <p>Enter your personal details and start your journey with us</p>

                <button class="btn btnSign-up" id="signUpBtn">
                    <i class="bi bi-arrow-left"></i> Sign In
                </button>
            </div>
        </div>
    </div>
    

    <!-- link script -->
    <script src="<?= base_URL() ?>assets/user/js/login_signup.js"></script>
    <script>
        function toggleEyeSlashIcon(input) {
            const eyeSlashIcon = input.nextElementSibling;
            eyeSlashIcon.style.visibility = input.value.trim() !== '' ? 'visible' : 'hidden';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
