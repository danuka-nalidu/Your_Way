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

    $customerSql = "INSERT INTO supplier (First_Name, Last_Name, NIC, Gender, Address, Username, Password)
                    VALUES ('$first_name', '$last_name', '$nic', '$gender', '$address', '$username', '$password')";

    if (mysqli_query($conn, $customerSql)) {
        $customerId = mysqli_insert_id($conn); 

        $emailSql = "INSERT INTO supplier_email (Supplier_ID, email)
                     VALUES ('$customerId', '$email')";
        mysqli_query($conn, $emailSql);

        $conSql = "INSERT INTO supplier_contact (Supplier_ID, Contact_No) VALUES ('$customerId', '$phone_number')";
        mysqli_query($conn, $conSql);

        session_start();
        $_SESSION['signup_success'] = 'Success';
        header('Location: login_new.php');
        
    } else {
        echo "Error inserting Supplier: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>