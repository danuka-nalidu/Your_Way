<?php

    include ('config.php');
    if ($_GET['submit']){
    $Car_ID= $_GET["Car_ID"];
    $Brand = $_GET["brand"];
    $Model = $_GET["modle"];
    $License_Plate_No = $_GET["lpnumber"];
    $Gas = $_GET["gas"];
    $Gear = $_GET["gear"];
    $Air_Condition = $_GET["ac"];
    $No_Of_Seats = $_GET["noofseats"];
    $Amount_Per_Hour = $_GET["perhour"];
    $Description = $_GET["Description"];
    $Upload_On=date("Y-m-d H:i:s");

    $sql = "UPDATE car SET
            Brand = '$Brand',
            Model = '$Model',
            License_Plate_No = '$License_Plate_No',
            Gas = '$Gas',
            Gear = '$Gear',
            Air_Condition = '$Air_Condition',
            No_Of_Seats = '$No_Of_Seats',
            Amount_per_hour = '$Amount_Per_Hour',
            Description_ = '$Description',
            Upload_On = '$Upload_On'
            WHERE Car_ID = $Car_ID ";

if(mysqli_query($conn, $sql)) {
    echo "<script>alert('Record Updated Successfully!!')</script>";
    echo "<script>window.location.href = 'CarListings.php';</script>";
} 
else {
    echo "<script>alert('Error in Update!!')</script>";
}
mysqli_close($conn);
    }
?>


