<?php

include_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the faq ID from the form
    $FAQ_ID = $_POST["faq_id"];
       // Create a new connection
       $conn = new mysqli($servername, $username, $password, $db);

       // Check the connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
   
       // SQL query to delete the record
       $sql = "DELETE FROM faq WHERE   FAQ_ID  = $FAQ_ID";
   
       // Execute the query
       if ($conn->query($sql) === TRUE) {
           //echo "Record deleted successfully.";
           echo "<script>alert('Record deleted Successfully!!')</script>";
           echo "<script>window.location.href = 'faq.html';</script>";
       } 
           
       } else {
           echo "Error deleting record: " . $conn->error;
       }
   
       // Close the connection
       $conn->close();
   

?>