<?php
    include 'config.php';
?>

<?php
    $SUPPLIER_ID=1;
    $currentDateTime = date("Y-m-d H:i:s");
    $sql = "SELECT * from requisition WHERE Supplier_ID = $SUPPLIER_ID ORDER BY Date_from DESC";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <title>Car Rental</title>
        <link rel="stylesheet" href="Style/HeaderStyle.css">
        <link rel="stylesheet" href="Style/bookings.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-----header------->

        <header>
            <a href=""><img class="logo" src="Images/Logo.png" alt="logo"></a>
            <div class="navigation">
                <ul class="nav" type="none">
                        <li class="navlist"><a href="index.php">Home</a></li>
                        <li class="navlist"><a href="newfleet.php">Fleet</a></li>
                        <li class="navlist"><a href="">Support</a></li>
                        <li class="navlist"><a href="">About us</a></li>
                </ul>
            </div>
            <div class="profiledetails">
                <!--<?php
                echo "<img class='profilephoto' src=$VRL alt='Profile Photo'>"?>-->
                    <p class="userdetails"><b>User Name</b><br/>
                    <font style="font-size: 12px;">User ID</font><br/>
                    <a class="edit" href="">edit profile</a></p>
            </div>
        </header>

        <!------side navigation ------->

        <nav class="leftnav">
            <div class="sidebar">
                <a href="CarOwnerDashboard.php" class="listleftnav"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="bookings.php" class="listleftnav"><i Class="fa fa-Bell"></i>Bookings</a>
                <a href="CarListings.php" class="listleftnav"><i Class="fa fa-list"></i>Supplied Cars</a>
                <a href="AddCarForme.html" class="listleftnav"><i Class="fa fa-plus"></i>Add New Car</a>
                <a href="newfleet.php" class="listleftnav"><i Class="fa fa-car"></i>Fleet</a>
                <a href="SupplierProfit.php" id="activ" class="listleftnav"><i Class="fa fa-landmark"></I>Profit</a>
                <a href="" class="listleftnav"><i Class="fa fa-file-invoice-dollar"></I>Log Out</a>
            </div>
        </nav> 
        
        <!------start of main -------->

       <div class="main">
            <div class="carlist">
                <h1 style="color: #0045f6;">New Bookings</h1>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Car ID</th>
                        <th>Car Name</th>
                        <th>Rent Date </th>
                        <th>Return Date</th>
                        <th>Customer ID</th>
                        <th></th>                      
                    </tr>

                    <?php
                
                $count=0;

                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                    
                        $Car_ID=$row['Car_ID'];
                        $Car_name=$row['Car_name'];
                        $Rent_date=$row['Date_from'];
                        $Return_Date=$row['Date_till'];
                        $Customer_ID=$row['Customer_ID'];

                        $count++;
                        /*$percentage = 1.2;
                        $newValue = $Amount_per_hour * $percentage;*/

                        echo"<tr>
                                <td>$count</td>
                                <td>$Car_ID</td>
                                <td>$Car_name</td>
                                <td>$Rent_date</td>
                                <td>$Return_Date</td>
                                <td>$Customer_ID</td>
                                <td><button type='button' class='accept'>Accept</button></td>
                            </tr>";
                    }
                } 
                else 
                {
                    echo "No records found.";
                }
                ?>
                    
                </table>
            </div>
        </div>

        <!--------footer--------->

       <footer>
            <div class="footer">
                <div class="two">
                <img class="footerlogo" src="Images/Logo.png" alt="logo">
                <div class="footernav">
                    <ul class="nav" type="none">
                        <li class="navlist"><a href="index.php">Home</a></li>
                        <li class="navlist"><a href="newfleet.php">Fleet</a></li>
                        <li class="navlist"><a href="">Support</a></li>
                        <li class="navlist"><a href="">About us</a></li>
                    </ul>
                </div>
            </div>
                <br/><br/><br/>

                <center><p style="color: white; font-size: 15px;">Copyright @ 2023 Your Way Car rental Service - All rights reserved</p></center>

                <div class="media">
                    <a href=""><i class="fa fa-whatsapp" style="color: white; font-size: 25px;"></i></a>
                    <a href=""><i class="fa fa-facebook" style="color: white; font-size: 25px;"></i></a>
                    <a href=""><i class="fa fa-linkedin" style="color: white; font-size: 25px;"></i></a>
                    <a href=""><i class="fa fa-paper-plane" style="color: white; font-size: 25px;"></i></a>
                    <a href=""><i class="fa fa-phone" style="color: white; font-size: 25px;"></i></a>
                    <a href=""><i class="fa fa-envelope" style="color: white; font-size: 25px;"></i></a>
                </div>

            </div>
        </footer>
    </body>
</html>