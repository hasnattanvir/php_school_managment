<?php
require('../database/database.php');
$intdata = new DB_Conn();
$message = ''; // Variable to hold the success or error message

$emailOtp = mt_rand(100000, 999999); // Generate a random 6-digit OTP
$regDate = date("Y-m-d H:i:s"); // Current date and time
$lastUpdationDate = $regDate; // Set the same as registration date initially

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $hashpass = md5($password); // Consider switching to a more secure password hashing method like password_hash()

    $errors = []; // Array to store error messages

    // Validation
    if (empty($name)) {
        $errors['name'] = "Name field cannot be empty";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone field cannot be empty";
    } else {
        // Validate Bangladeshi phone number format
        if (!preg_match('/^[0-9]{11}$/', $phone)) {
            $errors['phone'] = "Phone number must be 11 digits and Bangladeshi";
        }
        // Check if phone number is unique
        $phone_check = mysqli_query($intdata->dbc, "SELECT * FROM users WHERE phone = '$phone'");
        if (mysqli_num_rows($phone_check) > 0) {
            $errors['phone'] = "Phone number already exists";
        }
    }
    if (empty($email)) {
        $errors['email'] = "Email field cannot be empty";
    } else {
        // Check if email is unique
        $email_check = mysqli_query($intdata->dbc, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($email_check) > 0) {
            $errors['email'] = "Email already exists";
        }
    }
    if (empty($password)) {
        $errors['password'] = "Password field cannot be empty";
    }

    // If no errors, insert data
    if (empty($errors)) {
        $emailVerify = 0; // 0 means not verified

        $checksql = $intdata->insert($name, $phone, $email, $hashpass, $emailOtp, $emailVerify, $regDate, $lastUpdationDate);
        var_dump($emailVerify);
        if ($checksql) {
            $_SESSION['emailid'] = $email;

            // Code for sending the OTP via email
            $subject = "OTP Verification";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: User Signup <yourname@yourdomain.com>" . "\r\n";                          
            $ms = "<html><body><div><div>Dear $name,</div><br><br>";
            $ms .= "<div style='padding-top:8px;'>Thank you for registering with us. Your OTP for account verification is <strong>$emailOtp</strong></div><div></div></body></html>";

            mail($email, $subject, $ms, $headers); 

            echo "<script>window.location.href='./validation/verify-otp.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    } else {
        $message = "<div class='alert alert-danger'>Please correct the errors and try again.</div>";
    }
}
?>
