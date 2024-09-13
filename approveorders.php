<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>approve orders</title>
  <link rel="stylesheet" href="try2.css">
</head>
<body>
 <div>
    <img class= logo src= "Your Way - Car Rental System Logo.png">
                <br><br><br>
    <table style="width: 100%; height: 100%;">
        <tr>
            <td style="background-color: black; width: 20%; height: 100%;">
                
                 <div class="button-container">
                           <a href="dashboard.php"><button>Dashboard</button><br> 
                          <a href="approveorders.php"></a><button>Approve Orders</button><br></a>
                           <select>
                               <option value="option1">Manage Payments</option>
                               <option value="option2">Manage Driver Payments</option>
                               <option value="option3">Manage Supplier Payments</option>
                               
                           </select>
                           <br>
                           <a href="froms.html"> <select>
                            <a href="froms.html"> <option value="option1"> Updates</option></a>
                            <option value="option2">update car prices</option>
                            <option value="option3">update drivers</option>
                        </select><br></a><br>
                           <a href="faq.html"><button>Manage FAQs</button><br></a>
                            
                           <button>Settings</button><br><br>
                           <button>System Security</button><br>
                           <br><br><br>
                           <button>Logout</button>
                         </div> 

            </td>
         
        
      
                <td style="background-color: rgb(22, 24, 43); height: 100%; border-radius: 10px;">
                 

                 <div class="request" style="position: absolute; left:30%; top:10%;">
                     
                        <h1 style="color:white;" >Order Requests</h1>
                        <fieldset>
                        <h2 style="color:black;">Order Details<h2>
                        <?php
                        // Query to retrieve the data from the table
$query1 = "SELECT * FROM requisition";

                        $result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th> Rental_ID</th>";
   // echo "<th> Rental_Type</th>";
    echo "<th> Suppplier_ID</th>";
    echo "<th> Rental_Status</th>";
    echo "<th> Customer_ID</th>";
    echo "<th>Car_ID</th>";
     
echo"</tr>";

// Loop through the rows and display the data in the table
while ($row = mysqli_fetch_assoc($result1)) {
  echo "<tr>";
  echo "<td>" . $row['Rental_ID'] . "</td>";
 // echo "<td>" . $row['Rental_Type'] . "</td>";
  echo "<td>" . $row['Suppplier_ID'] . "</td>";
 echo  "<td>" . $row['Rental_Status'] . "</td>";
 echo  "<td>" . $row['Customer_ID'] . "</td>";
  echo "<td>" . $row['Car_ID'] . "</td>";
  echo "</tr>";
}

 echo"</table>";

// Close the database connection
//$conn->close();
}
?>
                        
                        
                     
                    </div><br><br><br><br><br><br>
<div style="position: absolute; left:30%; ">
<br><br><br><br>
<fieldset>
                      <h2 style="color: black;">Payment details</h2>
                        <?php
                        // Query to retrieve the data from the table
$query2 = "SELECT * FROM payments";

                        $result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th> Payment_ID</th>";
    echo "<th>  Amount</th>";
    echo "<th> Payment_method </th>";
    //echo "<th>  date</th>";
    echo "<th> Customer_ID</th>";
    //echo "<th>Admin_ID</th>";
     
echo"</tr>";

// Loop through the rows and display the data in the table
while ($row = mysqli_fetch_assoc($result2)) {
  echo "<tr>";
  echo "<td>" . $row['Payment_ID'] . "</td>";
  echo "<td>" . $row['Amount'] . "</td>";
  echo "<td>" . $row['Payment_method'] . "</td>";
 //echo  "<td>" . $row['date'] . "</td>";
 echo  "<td>" . $row['Customer_ID'] . "</td>";
 // echo "<td>" . $row['Admin_ID'] . "</td>";
  echo "</tr>";
}

 echo"</table>";

// Close the database connection
$conn->close();
}
?>
                        
                        

               
</div>
<button  style="margin-top:20%; background-color:darkgreen; border-radius:10px;">
    Approve
   </button>
</fieldset>
</td>
 
         
                </tr>
   
                </table>
              
                  
                 
</body>
</html>
