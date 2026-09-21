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
            Register
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <form method="POST" action="./actions/doRegister.php">
            <div>
                <label>Full Name</label>
                <input type="text" id="user-name" name="username">
            </div>
            <div>
                <label>E-mail Address</label>
                <input type="email" id="user-email" name="email">
            </div>
            <div>
                <label>Gender</label>
                <input type="radio" value="male" name="gender"> Male
                <input type="radio" value="female" name="gender"> Female
                <input type="radio" value="prefer_not_to_tell" name="gender"> Prefer not to tell
            </div>
            <div>
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="password">
            </div>
            <div>
                <button type="submit" name="register">Register</button>
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