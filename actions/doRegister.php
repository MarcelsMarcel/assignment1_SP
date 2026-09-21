<?php
session_start();
// TODO: Check user data and credential given from register.php page and save user data to session
// Detail TODO:
// 1. Validate the user data is valid or not
//      1.1. User name: must be filled
//      1.2. User email: ends with @gmail.com or @binus.ac.id
//      1.3. User gender: between Male, Female, and Prefer not to tell
//      1.4. User password: at least 8 characters, at least consists of 1 upper case characters, 1 lower case characters, 1 number, and 1 symbol
// 2. If all validation checks out, save user data to session
// 3. Redirect user to login.php page to log in

// CODE STARTS HERE

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];


    if(empty($username)) {
        $_SESSION['error'] = "Username must be filled";
        header("location: ../register.php");
        exit;
    }

    if(!preg_match("/@(gmail\.com|binus\.ac\.id)$/", $email)) {
        $_SESSION['error'] = "Email must end with @gmail.com or @binus.ac.id";
        header("location: ../register.php");
        exit;
    }

    if(!in_array($gender,['male', 'female', 'prefer_not_to_tell'])) {
        $_SESSION['error'] = "Pick a gender";
        header('location: ../register.php');
        exit;
    }

    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/", $password)) {
        $_SESSION['error'] = "Password must be at least 8 characters, at least consists of 1 upper case characters, 1 lower case characters, 1 number, and 1 symbol";
        header('location: ../register.php');
        exit;
    }
    
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['gender'] = $gender;

    header("location: ../login.php");
    exit;

} else {
    header("location: ../register.php");
    exit;
}

?>