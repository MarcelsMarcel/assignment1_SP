<?php
session_start();
// TODO: Log user out from the web application
// Detail TODO:
// 1. Remove saved user information in Session
// 2. Regenerate new Session ID
// 3. Redirect user to login.php page

// CODE STARTS HERE

$_SESSION = array();

if (isset($_COOKIE['remember_email'])) {
    setcookie('remember_email', '', time() - 3600, "/");
}

session_destroy();
session_start();
session_regenerate_id(true);

header("location: ./login.php");
exit;
?>