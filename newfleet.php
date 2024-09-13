<?php
    include_once 'config.php';
 ?>

<?php
$sql="SELECT * from car ORDER BY Upload_On DESC";
$result = mysqli_query($conn, $sql);

?>
<html>
    <head>
        <title>Fleet</title>
        <link rel="stylesheet" href="header and footer\CarRentalSystem\Style\HeaderStyle.css"> 
        <link rel="stylesheet" href="newfleet.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <header>
            <a href=""><img class="logo" src="Images/Logo.png" alt="logo"></a>
            <div class="navigation">
                <ul class="nav" type="none">
                        <li class="navlist"><a href="index.php">Home</a></li>
                        <li class="navlist"><a  href="newfleet.php">Fleet</a></li>
                        <li class="navlist"><a href="">Support</a></li>
                        <li class="navlist"><a href="">About us</a></li>
                        <li class="navlist"><a href="">Sign Up</a></li>        
                </ul>
            </div>
        </header>
<!--fleet-->
<div class = "dashboard">
    <nav class="left">
        <div class="container">   
        
        <ul id="list">
            <li><a href="#"><h2><i class='fas fa-car'> Available Brands </i></h2></a></li>
            <li><a href="#">Honda</a></li>
            <li><a href="#">Audi</a></li>
            <li><a href="#">BMW</a></li>
            <li><a href="#">Toyota</a></li>
            <li><a href="#">Benz</a></li>
        </ul>          
        <ul id="list">
            <li><a href="#"><h2><i class='fas fa-question'> Why US </i></h2></a></li>
            <li><a href="#">Wide Selection of Vehicles</a></li>
            <li><a href="#">Competitive Pricing</a></li>
            <li><a href="#">Convenient Reservation Process</a></li>
            <li><a href="#">Flexible Rental Periods</a></li>
            <li><a href="#">Excellent Customer Service</a></li>
        </ul>   

        </div>
    </nav>
    <nav class="right">
        <?php
                /*$sql="SELECT * from car ";
                $result = mysqli_query($conn, $sql);*/
                
                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                       /* $row=mysqli_fetch_assoc($result);*/
                        
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
                        $Car_Front=$row['Car_Front'];

                        $percentage = 1.2;
                        $newValue = $Amount_per_hour * $percentage;

                        echo" <div class='box-img'>
                        <img src='uploads/$Car_Front' alt='image of the car' width='400' height='250' style='border-radius: 5;'>
                        <div class='txtbox'>
                            <h1> $Brand $Model</h1>
                            <p> $Description_ </p>
                            <i class='fas fa-gas-pump'> $Gas</i>
                            <i class='fas fa-users'>  $No_Of_Seats</i>
                            <i class='far fa-sun'>  $Gear</i>
                            <i class='fas fa-fan'>  $Air_Condition</i><br><br>

                            Amount per hour: Rs.$newValue<br><br>

                            <a href=''><button type='button' class='rent'>JOIN US & RENT</button></a><br>

                        </div>
                    </div><br>";
                    
                    }
                } 
                else 
                {
                    echo "No records found.";
                }
                
         ?>
     </nav>
</div>
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