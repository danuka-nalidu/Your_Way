<?php
require('config.php');

$SUPPLIER_ID=1;
// File upload path
$targetDir = "uploads/";

// carFront
$carFront = basename($_FILES["carFront"]["name"]);
$targetFilePathForCarFront = $targetDir . $carFront;

// carBack
$carBack = basename($_FILES["carBack"]["name"]);
$targetFilePathForCarBack = $targetDir . $carBack;

// carSide
$carSide = basename($_FILES["carSide"]["name"]);
$targetFilePathForCarSide = $targetDir . $carSide;

// carInterior
$carInterior = basename($_FILES["carInterior"]["name"]);
$targetFilePathForCarInterior = $targetDir . $carInterior;

//CRMV
$carCRMV = basename($_FILES["CRMV"]["name"]);
$targetFilePathForCarCRMV = $targetDir . $carCRMV;

//VRL
$carVRL = basename($_FILES["VRL"]["name"]);
$targetFilePathForCarVRL = $targetDir . $carVRL;

$Brand = $_POST["brand"];
$Model = $_POST["modle"];
$License_Plate_No = $_POST["lpnumber"];
$Gas = $_POST["gas"];
$Gear = $_POST["gear"];
$Air_Condition = $_POST["ac"];
$No_Of_Seats = $_POST["noofseats"];
$Amount_Per_Hour = $_POST["perhour"];
/*$Car_Front = $_POST["carfront"];*/
// $Car_Back = $_POST["carback"];
// $Car_side = $_POST["carside"];
// $Interior = $_POST["interior"];
// $CRMV = $_POST["CRMV"];
// $VRL = $_POST["VRL"];
$Description = $_POST["Description"];
$Uploaded_On = date("Y-m-d H:i:s");


if (move_uploaded_file($_FILES["carFront"]["tmp_name"], $targetFilePathForCarFront) && move_uploaded_file($_FILES["carBack"]["tmp_name"], $targetFilePathForCarBack) && move_uploaded_file($_FILES['carSide']["tmp_name"], $targetFilePathForCarSide) && move_uploaded_file($_FILES['carInterior']["tmp_name"], $targetFilePathForCarInterior) && move_uploaded_file($_FILES["CRMV"]["tmp_name"], $targetFilePathForCarCRMV) && move_uploaded_file($_FILES["VRL"]["tmp_name"], $targetFilePathForCarVRL)) 
{
    $sql = "INSERT INTO car (Brand,Model,License_Plate_No,Gas,Gear,Air_Condition,No_Of_Seats,Amount_Per_Hour,Car_Front,Car_Back,Car_side,Interior,CRMV,VRL,Description_,supplier_ID,Upload_On)
        VALUES('$Brand','$Model','$License_Plate_No','$Gas','$Gear','$Air_Condition','$No_Of_Seats','$Amount_Per_Hour','$carFront','$carBack','$carSide','$carInterior','$carCRMV','$carVRL','$Description','$SUPPLIER_ID','$Uploaded_On')";
}

if ($conn->query($sql)) {
    echo "<script>alert('Record Inserted Successfully!!')</script>";
    echo "<script>window.location.href = 'CarOwnerDashboard.php';</script>";
} else {
    echo "<script>alert('Error in Insertion!!')</script>";
}
mysqli_close($conn);

?>



