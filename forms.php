<?php

include_once 'config.php';
// Query to retrieve the data from the table
$query3 = "SELECT Car_ID,Brand,Model,carprice  FROM car";

$result3 = mysqli_query($conn, $query3);
if (mysqli_num_rows($result3) > 0) {
echo "<table>";
echo "<tr>";
echo "<th>Car_ID</th>";
echo "<th>Brand</th>";
echo "<th>Model</th>";

echo "<th> carprice</th>";

echo"</tr>";

// Loop through the rows and display the data in the table
while ($row = mysqli_fetch_assoc($result3)) {
echo "<tr>";
echo "<td>" . $row['Car_ID'] . "</td>";
echo "<td>" . $row['Brand'] . "</td>";
echo "<td>" . $row['Model'] . "</td>";
echo "<td>" . $row['carprice'] . "</td>";
echo "</tr>";
}

echo"</table>";

// Close the database connection
//$conn->close();
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the mobile number and new password from the form
    $Car_ID= $_POST['Car_ID'];
    $newPrice= $_POST['newPrice'];

    // Query to retrieve user details based on mobile number
    $sql = "SELECT * FROM car WHERE Car_ID ='$Car_ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mobile number found, update the password for the user
        $updateSql = "UPDATE car SET carprice ='$newPrice' WHERE Car_ID ='$Car_ID'";

        if ($conn->query($updateSql) === TRUE) {
            echo "<script>alert('car price has been reset successfully!')</script>";
           // echo "<script>window.location.href = 'Login_page.html';</script>";
        } else {
            echo "<script>alert('Error updating car price:')</script>";
            //echo "<script>window.location.href = 'forgot_password.html';</script>";
        }
    } else {
        echo "<script>alert('car id  not found!')</script>";
       // echo "<script>window.location.href = 'forgot_password.html';</script>";
    }
     
}
    
// Check if the form is submitted
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the rental ID from the form
    $rental_id = $_POST["rental_id"];
// Create a new connection
$conn = new mysqli($servername, $username, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete the record
$sql = "DELETE FROM car WHERE Rental_ID = $rental_id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}
*/
 



    // Close the database connection
    $conn->close();

?>
 



