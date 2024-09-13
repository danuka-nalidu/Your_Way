<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $confirm_password = $_POST["confirm_password"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $nic = $_POST["nic"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $driving_license = $_POST["driving_license"];

    $driverSql = "INSERT INTO driver (nic, first_name, last_name, gender, address, dob, username, password, driving_license)
                    VALUES ('$nic', '$first_name', '$last_name', '$gender', '$address', '$dob', '$username', '$password', '$driving_license')";

    if (mysqli_query($conn, $driverSql)) {
        $customerId = mysqli_insert_id($conn); 

        $emailSql = "INSERT INTO driver_email (Driver_ID, email)
                    VALUES ('$customerId', '$email')";
        mysqli_query($conn, $emailSql);

        $conSql = "INSERT INTO driver_contact (Driver_ID, Contact_No) VALUES ('$customerId', '$phone_number')";
        mysqli_query($conn, $conSql);

        session_start();
        $_SESSION['signup_success'] = 'Success';
        header('Location: login_new.php');
        
    } else {
        echo "Error inserting driver: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
