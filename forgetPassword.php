<?php
    include_once "config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "SELECT * FROM customer WHERE Username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $updateSql = "UPDATE customer SET Password = '$password' WHERE Username = '$username'";

            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Password has been reset successfully!')</script>";
                echo "<script>window.location.href = 'login_new.php';</script>";
            } else {
                echo "<script>alert('Error updating password:')</script>";
                echo "<script>window.location.href = 'forgetPassword.php';</script>";
            }
        } else {
            echo "<script>alert('Mobile number not found!')</script>";
            echo "<script>window.location.href = 'forgetPassword.php';</script>";
        }

        $conn->close();
    }
?>