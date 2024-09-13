<?php 
session_start();
$_SESSION['AUTH'] = false;
require_once 'config.php';



$errors = array();
$user_id = "";

if($_POST) {		

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

    $user_type = $_POST['ctype'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 
		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {

        if($user_type == 1){
            $sql = "SELECT * FROM supplier WHERE Username='$username' AND Password='$password'";
		    $result = $conn->query($sql);  
            if($result->num_rows > 0) {
				$value = $result->fetch_assoc();
				$user_name = $value['Username'];
				// set session
				$_SESSION['USERNAME'] = $user_name;
                $_SESSION['AUTH'] = true;	
                $_SESSION['USERTYPE'] = 'supplier';				

                header('location:CarOwnerDashboard.php');					
			} else{				
				$errors[] = "Incorrect username/password combination";
			} 
        }
        else if($user_type == 2){
            $sql = "SELECT * FROM driver WHERE username='$username' AND password='$password'";
		    $result = $conn->query($sql);  
            if($result->num_rows > 0) {
				$value = $result->fetch_assoc();
				$user_name = $value['username'];
				// set session
				$_SESSION['USERNAME'] = $user_name;
                $_SESSION['AUTH'] = true;		
                $_SESSION['USERTYPE'] = 'driver';				

                header('location:driverdashboard.html');					
			} else{				
				$errors[] = "Incorrect username/password combination";
			} 
        }
        else{
            $sql = "SELECT * FROM customer WHERE Username='$username' AND Password='$password'";
		    $result = $conn->query($sql);  
            if($result->num_rows > 0) {
				$value = $result->fetch_assoc();
				$user_name = $value['Username'];
				// set session
				$_SESSION['USERNAME'] = $user_name;
                $_SESSION['AUTH'] = true;		
                $_SESSION['USERTYPE'] = 'customer';				

                header('location:newfleetcustomer.php');					
			} else{				
				$errors[] = "Incorrect username/password combination";
			} 
        }		
	} 
	
} // /if $_POST
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
        <h1>Login</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="text_area">
                <input type="text" name="username" placeholder="Username" required>
                <hr class="line">
            </div>
            <div class="text_area">
                <input type="password" name="password" placeholder="Password" required>
                <hr class="line">
                <br>
                <p style="color: red; font-family: 'Verdana';"> 
                <?php 
                foreach($errors as $error){ 
                    echo $error . "\n"; 
                    } ?></p>
            </div>

            <div class="text_area">
                <label for="">Type</label>
                <select name="ctype">

                    <option value="1">Supplier</option>
                    <option value="2">Driver</option>
                    <option value="3">Customer</option>
                </select>
            </div>


            <input type="submit" name="submit" value="Login" class="login_btn">
            <div>
                    <a href="forgetPassword.html" class="forgot">Forgot Password?</a>
                </div>
            <div class="signup_link">
                Not a member? <a href="register.html">Register as a customer</a><br>
                Not a member? <a href="driverRegister.html">Register as a driver</a><br>
                Not a member? <a href="supplierRegister.html">Register as a Supplier</a><br>
            </div>
        </form>
    </div>
</body>
</html>
