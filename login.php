<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project 1 - Login Register</title>
</head>
<body>
    <div>
        <div>
            Login
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <form method="POST" action="./actions/doLogin.php">
            <div>
                <label for="user-email"">E-mail Address</label>
                <input type="text" id="user-email" name="email">
            </div>
            <div>
                <label for="user-password"">Password</label>
                <input type="password" id="user-password" name="password">
            </div>
            <div>
                <input type="checkbox" name="remember-me" id="remember-me"> Remember me
            </div>
            <div>
                <button type="submit" name="login">Login</button>
            </div>

            <!-- TODO: Print error message, if exists, that comes from actions/doLogin.php. -->
            <!-- CODE STARTS HERE -->
            <div id="error-message">
                <?php
                    if(isset($_SESSION['error'])) {
                        echo($_SESSION['error']);
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
            <!-- CODE ENDS HERE -->

        </form>
        <!-- CODE ENDS HERE -->
    </div>
</body>
</html>