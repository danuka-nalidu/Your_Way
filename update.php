<?php
include_once 'config.php';
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the faq  id and new password from the form
    $FAQ_ID= $_POST['FAQ_ID'];
    $question= $_POST['question'];
    $answer= $_POST['answer'];

    // Query to retrieve user details based on  faq id
    $sql = "SELECT * FROM faq WHERE  FAQ_ID ='$FAQ_ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         
        $updateSql = "UPDATE faq SET  question='$question', answer='$answer' WHERE FAQ_ID ='$FAQ_ID'";

        if ($conn->query($updateSql) === TRUE) {
            echo "<script>alert('FAQ has been reset successfully!')</script>";
            echo "<script>window.location.href = 'faq.html';</script>";
        } else {
            echo "<script>alert('Error updating faq:')</script>";
             
        }
    } else {
        echo "<script>alert('faq id  not found!')</script>";
    }
     

    
 

    // Close the database connection
    $conn->close();
}
?>