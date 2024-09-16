<?php
session_start();

// Destroy all session data
session_unset(); // Unset $_SESSION variables
session_destroy(); // Destroy the session

// Clear the session cookie by setting its expiration time to the past
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to the login page
header("Location: ../index.php");
exit();
?>
