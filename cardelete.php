<?php
    require 'config.php';

    $Car_ID = $_GET['id'];

    $query = "DELETE FROM car WHERE Car_ID = $Car_ID";

    $data = mysqli_query($conn, $query);
    
    if ($data) {
        echo "<script>alert('Record Deleted')</script>";
        header("location:CarListings.php");
    }else{
        echo "<script>alert('Error in Delete')</script>";
    }
?>

