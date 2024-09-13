<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

include_once ('config.php');

$Pickup_Location = $_POST["Pickup_Location"];
$Dropoff_Location = $_POST["Dropoff_Location"];
$Mobile_Number = $_POST["Mobile_Number"];
$email = $_POST["email"];
$Date_from = $_POST["Date_from"];
$Date_till = $_POST["Date_till"];
$Payment_method = $_POST["Payment_method"];
$Cardholder_Name = $_POST["Cardholder_Name"];
$Card_Number = $_POST["Card_Number"];
$cvv = $_POST["cvv"];
$NIC = $_POST["NIC"];
$comments = $_POST["comments"];
$expiration_date = $_POST["expiration_date"];

$sql = "INSERT INTO requisition(Pickup_Location, Dropoff_Location, Mobile_Number, email, Date_from, Date_till, NIC,Rental_Status)
        VALUES ('$Pickup_Location', '$Dropoff_Location', '$Mobile_Number', '$email', '$Date_from', '$Date_till', '$NIC','Pending');
        
        INSERT INTO payments(Payment_method, Cardholder_Name, Card_Number, cvv, comments, expiration_date)
        VALUES ('$Payment_method', '$Cardholder_Name', '$Card_Number', '$cvv', '$comments', '$expiration_date')";


if(mysqli_multi_query($conn, $sql)) {
    echo "<script>alert('Record Inserted Successfully!!')</script>";
    echo "<script>window.location.href = 'history.php';</script>";
} 
else {
    echo "<script>alert('Error in Insertion!!')</script>";
}
mysqli_close($conn);

?>
