

<html>
    <head></head>
        <body>
<div  > 
                        <fieldset style="width:50%; border-radius: 10px; background-color: azure; ;"> 
                            <h2>Delete Rental</h2>
                            <form method="POST" >
                                <label for="Car_ID">Car ID:</label>
                                <input type="text" name="Car_ID" id="Car_ID">
                                <input type="submit" value="Delete">
                            </form>
                </fieldset>
</body>
</html>
<?php

include_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the car ID from the form
    $Car_ID = $_POST["Car_ID"];
       // Create a new connection
       $conn = new mysqli($servername, $username, $password, $db);

       // Check the connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
   
       // SQL query to delete the record
       $sql = "DELETE FROM car WHERE Car_ID = $Car_ID";
   
       // Execute the query
       if ($conn->query($sql) === TRUE) {
           //echo "Record deleted successfully.";
           echo "<script>alert('Record deleted Successfully!!')</script>";
           echo "<script>window.location.href = 'faq.html';</script>";
       } 
        else {
           echo "Error deleting record: " . $conn->error;
       }
   
       // Close the connection
       $conn->close();
   }

?>