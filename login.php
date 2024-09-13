<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['signup_success'] = '';
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password exist in the customer table
    $query = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Username and password are correct
        $row = mysqli_fetch_assoc($result);
        $name = $row["first_name"];
        echo "Logged in successfully";
        header("Location: index.html?name=" . urlencode($name));
        exit();
    } else {
        // Username or password is incorrect
        $error = "   Invalid username or password  ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="log_in">

    <?php 
    if(isset($_SESSION['signup_success'])){
        echo $_SESSION['signup_success'];
    }
    
    ?>

        <h1>Login</h1>
        <form method="post" action="login.php">
            <div class="text_area">
                <input type="text" name="username" placeholder="Username" required>
                <hr class="line">
            </div>
            <div class="text_area">
                <input type="password" name="password" placeholder="Password" required>
                <hr class="line">
                <br>
                <div>
                    <a href="#" class="forgot">Forgot Password?</a>
                </div>
            </div>
            <input type="submit" name="submit" value="Login" class="login_btn">
            <div class="signup_link">
                Not a member? <a href="register.html">Register as a customer</a>
                Not a member? <a href="driverRegister.html">Register as a diver</a>
            </div>
            <?php if(isset($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
