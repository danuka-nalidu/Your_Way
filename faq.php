 

<?php
    include_once 'config.php';
?>

<?php

    
    $question=$_POST["question"];
    $answer=$_POST["answer"];
     


    $sql="INSERT INTO faq( question,answer )VALUES('$question', '$answer')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Record Inserted Successfully!!')</script>";
        echo "<script>window.location.href = 'faq.html';</script>";
    } 
    else {
        echo "<script>alert('Error in Insertion!!')</script>";
    }
 
    // Close the database connection
    $conn->close();

?>
 



 


