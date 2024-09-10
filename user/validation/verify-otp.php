<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// session_start();
require('../../database/database.php');

$intdatax = new DB_Conn();

if (isset($_POST['verify'])) {
    $email = $_SESSION['emailid'];
    $otp = $_POST['otp'];

    // Verify OTP
    $query = mysqli_query($intdatax->dbc, "SELECT * FROM users WHERE email = '$email' AND emailOtp = '$otp'");
    if (mysqli_num_rows($query) > 0) {
        // Update the email verification status
        $update_query = mysqli_query($intdatax->dbc, "UPDATE users SET isEmailVerify = 1 WHERE email = '$email'");
        header('location:../../index.php');
        // echo "<script>alert('Email verification successful!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify Your Email</h2>
    <form method="post">
        <label>Enter OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit" name="verify">Verify OTP</button>
    </form>
</body>
</html>
