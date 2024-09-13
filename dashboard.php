
<?php
include_once 'config.php';
 
?>

<?php
// Query to calculate the summation of three values in the column
$query = "SELECT SUM(amount) AS amount FROM payments";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the total sum
    $totalSum = $row['amount'];
} else {
    echo "Error: " . $conn->error;
}

 


// Query to calculate the summation of values in column1 from table1
$query1 = "SELECT SUM(amount) AS amount FROM  supplier_profit";

// Execute the query for table1
$result1 = $conn->query($query1);

// Check if the query for table1 was successful
if ($result1) {
    // Fetch the result as an associative array for table1
    $row1 = $result1->fetch_assoc();

    // Get the total sum from table1
    $totalSum1 = $row1['amount'];
} else {
    echo "Error: " . $conn->error;
}

// Query to calculate the summation of values in column2 from table2
$query2 = "SELECT SUM(amount) AS amount FROM driver_salary";

// Execute the query for table2
$result2 = $conn->query($query2);

// Check if the query for table2 was successful
if ($result2) {
    // Fetch the result as an associative array for table2
    $row2 = $result2->fetch_assoc();

    // Get the total sum from table2
    $totalSum2 = $row2['amount'];
} else {
    echo "Error: " . $conn->error;
}


// Assuming you have a database connection established

// Query to retrieve the data from the table
$query3 = "SELECT  *  FROM requisition";


?>


<!DOCTYPE html>
<html>
<head>
  <title>approve orders</title>
  <link rel="stylesheet" href=" dashboardtry1.css">
</head>
<body>
 <div>
    <img class= logo src= "Your Way - Car Rental System Logo.png">
                
    <table  id="table1" style="width: 100%;  ">
        <tr>
            <td style="background-color: black; width: 20%; height: 100%;  ">
                
                 <div class="button-container" >
                           <a href="dashboard.php"><button >Dashboard</button><br></a>
                          <a href="approveorders.php"> <button>Approve Orders</button><br></a>
                           <select>
                               <option value="option1">Manage Payments</option>
                               <option value="option2">Manage Driver Payments</option>
                               <option value="option3">Manage Supplier Payments</option>
                               
                           </select>
                           <br>
                           <a href="froms.html"><select>
                            <option value="option1"> Updates</option>
                            <option value="option2">update car prices</option>
                            <option value="option3">update drivers</option>
                        </select> </a><br>
                        <a href="froms.html"><button>Manage FAQs</button><br></a>
                           <button>Settings</button><br><br>
                           <button>System Security</button><br>
                           <br><br><br>
                           <button>Logout</button>
                         </div> 

            </td>
         
        
      
                <td style="background-color:rgb(22, 24, 43);  width:30%;">
                <div>
                 <h1>Total earning<h1>
                 <fieldset style="border-radius:10px; background-color:lightslategrey;">
                 <h2>Total earning: <?php echo $totalSum; ?></h2>
                 </fieldset>
                 <h1>Total expences</h1>
                 <fieldset style="border-radius:10px; background-color: lightslategrey;">
                 <h2>Total expences: <?php echo $totalSum1 + $totalSum2; ?></h2>
                 
                 </fieldset>
                  <br>
                  <h1>Live car status</h1>
                        <fieldset style="border-radius:10px; background-color:lightslategrey;">
                             
                            <?php
                        $result3 = mysqli_query($conn, $query3);
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Rental_ID</th>";
    echo "<th>Pickup_Location</th>";
    echo "<th> Dropoff_Location</th>";
     
    echo "<th> Rental_Status</th>";
    echo "<th>Car_ID</th>";
    echo "<th>Suppplier_ID</th>";
    
     
     
echo"</tr>";

// Loop through the rows and display the data in the table
while ($row = mysqli_fetch_assoc($result3)) {
  echo "<tr>";
  echo "<td>" . $row['Rental_ID'] . "</td>";
  echo "<td>" . $row['Pickup_Location'] . "</td>";
  echo "<td>" . $row['Dropoff_Location'] . "</td>";
  echo "<td>" . $row['Rental_Status'] . "</td>";
  echo "<td>" . $row['Car_ID'] . "</td>";
  echo "<td>" . $row['Suppplier_ID'] . "</td>";
  echo "</tr>";
}

 echo"</table>";

 
}
?>
                        </fieldset>
                     
            
</td>
                <td style="width:25%; background-color:rgb(22, 24, 43);">
                    <?php // Query to calculate the summation of values in column1 from table4
$query4 = "SELECT SUM(Car_ID) AS Car_ID FROM  returns_";

// Execute the query for table4
$result4 = $conn->query($query4);

// Check if the query for table1 was successful
if ($result4) {
    // Fetch the result as an associative array for table4
    $row4 = $result4->fetch_assoc();

    // Get the total sum from table4
    $totalSum4 = $row4['Car_ID'];
} else {
    echo "Error: " . $conn->error;
}
$query5 = "SELECT SUM(Supplier_ID) AS Supplier_ID FROM  supplier";

// Execute the query for table5
$result5 = $conn->query($query5);

// Check if the query for table4 was successful
if ($result5) {
    // Fetch the result as an associative array for table5
    $row5 = $result5->fetch_assoc();

    // Get the total sum from table5
    $totalSum5 = $row5['Supplier_ID'];
} else {
    echo "Error: " . $conn->error;
}
 
$query6 = "SELECT SUM(Driver_ID) AS Driver_ID FROM   driver";

// Execute the query for table6
$result6 = $conn->query($query6);

// Check if the query for table1 was successful
if ($result6) {
    // Fetch the result as an associative array for table6
    $row6 = $result6->fetch_assoc();

    // Get the total sum from table6
    $totalSum6 = $row6['Driver_ID'];
} else {
    echo "Error: " . $conn->error;
}

$query7 = "SELECT SUM(Rental_ID) AS Rental_ID FROM    requisition";

// Execute the query for table7
$result7 = $conn->query($query7);

// Check if the query for table1 was successful
if ($result7) {
    // Fetch the result as an associative array for table7
    $row7 = $result7->fetch_assoc();

    // Get the total sum from table7
    $totalSum7 = $row7['Rental_ID'];
} else {
    echo "Error: " . $conn->error;
}
// Close the database connection
$conn->close();

 ?>

<h1>Total Returns</h1>
                 <fieldset style="border-radius:10px; background-color: lightslategrey;">
                 <h1 style="color:black;">Total returns: <?php echo $totalSum4; ?></h1>
                 
                 </fieldset>
                 <h1>Total Orders </h1>
                    <fieldset style="border-radius:10px; background-color: lightslategrey;">
                    <h1  style=" color: black;">Total Orders: <?php echo $totalSum7; ?></h1>
                    </fieldset>
                  <br>
                        
                </td>
                <td style="width:25%; background-color: rgb(22, 24, 43);">
                
                    <h1>Total suppliers</h1>
                    <fieldset style="border-radius:10px; background-color: lightslategrey;">
                    <h1  style=" color: black;">Total suppliers: <?php echo $totalSum5; ?></h1>
                    </fieldset>
                    <h1>Total suppliers</h1>
                    <fieldset style="border-radius:10px; background-color: lightslategrey;">
                    <h1  style=" color: black;">Total Drivers: <?php echo $totalSum6; ?></h1>
                    </fieldset>
                </td>

</tr>
</table>
              
                  
                </div>               
</body>
</html>
