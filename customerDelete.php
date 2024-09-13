<?php
session_start();
require_once('config.php');
require_once('functions.php');

redirect_invalid_session();

echo $_SESSION['USERTYPE'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
   

<h1>Delete Customer</h1>
<?php
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);  
if($result->num_rows > 0) {      
    ?>    
     <table class="table">
        <tr>
            <td>Customer ID</td>
            <td>NIC</td>
            <td>First Name</td>
            <td>Action</td>
        </tr>    
     <?php
    while ( $row = mysqli_fetch_assoc($result)) {
        ?>  
        <tr>
            <td><?= $row['Customer_ID'] ?></td>
            <td><?= $row['NIC'] ?></td>
            <td><?= $row['First_Name'] ?></td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Delete
</button></td>

        </tr> 

   <?php 
    }
    ?>    
    </table>
  <?php 

				
} else{				
   echo 'No data';
} 
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
