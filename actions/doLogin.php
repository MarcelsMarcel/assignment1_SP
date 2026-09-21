<?php
session_start();
// TODO: Check sent user credentials from login.php page and logged them into the web application
// Detail TODO:
// 1. Get user credentials (email and password) that has been sent from login.php
// 2. Compare sent user credentials and saved user credentials when register new user (refer to the Register page procedure and logic)
// 3. If user comparation shows the user does not exists in saved user credentials, redirect back to login.php page and show error message of "Wrong user e-mail and password combination".
// 4. If user comparation shows the user exists in saved user credentials, regenerate the session ID, save user data to session as logged on user and redirect to home.php

// Notes:
// 1. When user chooses to check "Remember Me" checkbox, issue a persistent cookie with an expiration of 7 days. On another day the user accessed the web application, they will be logged on to their logged on user data.

// CODE STARTS HERE

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember-me']);

    $saved_email = $_SESSION['email'] ?? NULL;
    $saved_password = $_SESSION['password'] ?? NULL;

    if(empty($email) || empty($password) || $email !== $saved_email || $password !== $saved_password) {
        $_SESSION['error'] = "Wrong user e-mail and password combination";
        header('location: ../login.php');
        exit;
    }

    session_regenerate_id(true);
    $_SESSION['is_logged_in'] = true;

    if($remember == true) {
        setcookie("remember_email", email, time() + (7 * 24 * 60 * 60), "/");
    } else {
        if(isset($_COOKIE["remember_email"])) {
            setcookie("remember_email", "", time() - 3600, "/");
        }
    }

    header("location: ../index.php");
    exit;
} else {
    header("location: ../login.php");
    exit;
}




?>