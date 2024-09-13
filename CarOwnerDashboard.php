<?php
    include 'config.php';
?>

<?php
    $SUPPLIER_ID=1;
    $sql="SELECT * from car WHERE Supplier_ID = $SUPPLIER_ID ORDER BY Upload_On DESC";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <title>Car Rental</title>
        <link rel="stylesheet" href="Style/HeaderStyle.css">
        <link rel="stylesheet" href="Style/CarOwnerDashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.nrt/npm/boxicons@latest/css/boxicons.min.css">
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
                    <img class='profilephoto' src=$VRL alt='Profile Photo'>
                    <p class="userdetails"><b>User Name :</b><br/>
                    <font style="font-size: 12px;">User ID :<?php echo $SUPPLIER_ID ?> </font><br/>
                    
                    <a class="edit" href="">edit profile</a></p>
            </div>
        </header>

        <!------side navigation ------->

        <nav class="leftnav">
            <div class="sidebar">
                <a href="CarOwnerDashboard.php" class="listleftnav"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="bookings.php" class="listleftnav"><i Class="fa fa-Bell"></i>Bookings</a>
                <a href="CarListings.php" class="listleftnav"><i Class="fa fa-list"></i>Car Listings</a>
                <a href="AddCarForme.html" class="listleftnav"><i Class="fa fa-plus"></i>Add New Car</a>
                <a href="newfleet.php" class="listleftnav"><i Class="fa fa-car"></i>Fleet</a>
                <a href="SupplierProfit.php" class="listleftnav"><i Class="fa fa-landmark"></I>Profit</a>
                <a href="logout.php" class="listleftnav"><box-icon name='log-out'></box-icon>Log Out</a>
                <a href="deleteSupplier.html" class="listleftnav"><box-icon name='log-out'></box-icon>Delete Account</a>
            </div>
        </nav> 
        
        <!------start of main -------->

       <div class="main">
        <h1 class="title">Dashboard</h1>

            <div class="container">
                <div class="income">
                    <i id="icon" class="fa fa-star"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Total income</h3>
                            <h1>$ 52,000</h1>
                        </div>
                    </div>
                    <p class="small">Last 1 Month</p>
                    <button type="button" >See more >></button>
                </div>

                <!---------end of income--------->

                <div class="bookings">
                    <i id="icon" class="fa fa-Bell"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>New Bookings</h3>
                            <h1>3 Bookings</h1>
                        </div>
                    </div>
                    <p class="small">Last 24 Hours</p>
                    <button type="button" >See more >></button>
                </div>
                <!---------end of bookings--------->

                
                <div class="ratings">
                    <i id="icon" class="fa fa-star"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Ratings</h3>
                            <h1><i id="str" Class="fa fa-star" style="color: blue;"></i>
                                <i id="str" Class="fa fa-star" style="color: blue;"></i>
                                <i id="str" Class="fa fa-star" style="color: blue;"></i>
                                <i id="str" Class="fa fa-star" style="color: blue;"></i>
                                <i id="str" Class="fa fa-star"></i></h1>
                        </div>
                    </div>
                    <p class="small"></p>
                </div>
                <!---------end of ratings--------->
            </div>

            <div class="carlist">
                <h1 class="title">Supplied Cars</h1>
                <div class="table">

                <table>
                    <tr>
                        <th>No</th>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Listed Date</th>
                    </tr>

            <?php
                
                $count=0;

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
                        /*$percentage = 1.2;
                        $newValue = $Amount_per_hour * $percentage;*/

                        echo"<tr>
                                <td>$count</td>
                                <td>$Car_ID</td>
                                <td>$Brand</td>
                                <td>$Model</td>
                                <td>$Upload_On</td>
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
            <div class="button">
                <button type="button" >See more >></button>
            </div>
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