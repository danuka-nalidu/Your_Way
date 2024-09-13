<?php
    include 'config.php';
?>

<?php
    $SUPPLIER_ID=1;
    $sql = "SELECT * from car WHERE Supplier_ID = $SUPPLIER_ID ORDER BY Upload_On DESC";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <title>Car Rental</title>
        <link rel="stylesheet" href="Style/HeaderStyle.css">
        <link rel="stylesheet" href="Style/CarListings.css">
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
                <a href="SupplierProfit.php" class="listleftnav"><i Class="fa fa-landmark"></I>Profit</a>
                <a href="" class="listleftnav"><i Class="fa fa-file-invoice-dollar"></I>Log Out</a>
            </div>
        </nav> 
        
        <!------start of main -------->

       <div class="main">
            <div class="carlist">
                <h1 style="color: #0045f6;">Supplied Cars</h1>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Amount Per Hour</th>
                        <th>Listed Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                
                $count=0;
//Me file eka dha table view karannae ow ow
                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                      
                        $Car_ID=$row['Car_ID'];
                        $License_Plate_No=$row['License_Plate_No'];
                        $Brand=$row['Brand'];
                        $Gas=$row['Gas'];
                        $Gear=$row['Gear'];
                        $Model=$row['Model'];
                        $No_Of_Seats=$row['No_Of_Seats'];
                        $Amount_per_hour=$row['Amount_per_hour'];
                        $CRMV=$row['CRMV'];
                        $VRL=$row['VRL'];
                        $Description_=$row['Description_'];
                        $Supplier_ID=$row['Supplier_ID'];
                        $Air_Condition=$row['Air_Condition'];
                        $Upload_On=$row['Upload_On'];

                        $count++;

                        echo"<tr>
                                <td>$count</td>
                                <td>$Car_ID</td>
                                <td>$Brand</td>
                                <td>$Model</td>
                                <td>$Amount_per_hour</td>
                                <td>$Upload_On</td>
                                <td><button type='button' class='update'>
                                        <a href='carupdate.php?id=$row[Car_ID]&License_Plate_No=$row[License_Plate_No]&Brand=$row[Brand]&Gas=$row[Gas]&Gear=$row[Gear]&Model=$row[Model]&No_Of_Seats=$row[No_Of_Seats]&Amount_per_hour=$row[Amount_per_hour]&CRMV=$row[CRMV]&VRL=$row[VRL]&Description_=$row[Description_]&Supplier_ID=$row[Supplier_ID]&Air_Condition=$row[Air_Condition]'>Update</a>
                                    </button></td>
                                <td>
                                    <button type='button' class='delete'>
                                        <a id='delete' href='cardelete.php?id=$row[Car_ID]'>Delete</a>
                                    </button></td>
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


