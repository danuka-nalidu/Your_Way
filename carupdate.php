<?php
require('config.php');

$Car_ID = $_GET['id'];
$License_Plate_No = $_GET['License_Plate_No'];
$Brand = $_GET['Brand'];
$Gas = $_GET['Gas'];
$Gear = $_GET['Gear'];
$Model = $_GET['Model'];
$No_Of_Seats = $_GET['No_Of_Seats'];
$Amount_per_hour = $_GET['Amount_per_hour'];
$CRMV = $_GET['CRMV'];
$VRL = $_GET['VRL'];
$Description_ = $_GET['Description_'];
$Supplier_ID = $_GET['Supplier_ID'];
$Air_Condition = $_GET['Air_Condition'];
?>

<html>

    <head>
        <title>Add New Car</title>
        <link rel="stylesheet" href="Style/HeaderStyle.css">
        <link rel="stylesheet" href="Style/AddCarForme.css">
        <script src="JS/AddCarForm.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <header class="header">
            <a href=""><img class="logo" src="Images/Logo.png" alt="logo"></a>
            <div class="navigation">
                <ul class="nav" type="none">
                    <li class="navlist"><a href="">Fleet</a></li>
                    <li class="navlist"><a href="">Support</a></li>
                    <li class="navlist"><a href="">About us</a></li>
                    <li class="navlist"><a href="">Contact us</a></li>
                </ul>
            </div>
            <div class="profiledetails">
                <img class="profilephoto" src="" alt="Profile Photo">
                <p class="userdetails"><b>User Name</b><br />
                    <font style="font-size: 12px;">User ID</font><br />
                    <a class="edit" href="">edit profile</a>
                </p>
            </div>
        </header>
        <center>
            <div class="form">
                <a href="CarListings.php"><button class="btn-close">&times;</button></a><br/><br/>
                <form action="SubmitUpdatecar.php" method="get">
                    <h2>Add New Car</h2>
                    <h3 style="text-align:left;">Car Details</h3>

                    <div class="inputbox">
                        <input type="text" name="Car_ID" value=<?php echo $Car_ID ?> readonly><label>Car ID</label>
                    </div>

                    <div class="inputbox">
                        <input type="text" name="brand" value=<?php echo $Brand ?> readonly><label>Brand</label>
                    </div>

                    <div class="inputbox">
                        <input type="text" name="modle" value=<?php echo $Model ?> readonly><label>Model</label>
                    </div>

                    <div class="inputbox">
                        <input type="text" name="lpnumber" value=<?php echo $License_Plate_No ?> readonly><label>Licence Plate Number</label>
                    </div>


                    <p class="p"><label class="radioinput" for="gas" value=<?php echo $Gas ?>>Gas</label><br /><br />
                        <input type="radio" name="gas" value="petrol"><label class="radiolabel" for="Petrol">Petrol</label>
                        <input type="radio" name="gas" value="diesel"><label class="radiolabel" for="Diesel">Diesel</label>
                    </p><br />


                    <p class="p">
                        <label for="gear">Gear</label><br /><br />
                            <input type="radio" name="gear" value="manual"> <label for="manual">Manual</label>
                            <input type="radio" name="gear" value="auto"><label for="auto">Auto</label>
                    </p><br />

                    <p class="p"><label for="gear">Air Condition</label><br /><br />
                        <input type="radio" name="ac" value="non ac"> <label for="non ac">Non AC</label>
                        <input type="radio" name="ac" value="ac"><label for="ac">AC</label>
                    </p><br />

                    <div class="inputbox">
                        <input type="number" name="noofseats" value=<?php echo $No_Of_Seats ?> required><label>No Of Seats</label>
                    </div>

                    <div class="inputbox">
                        <input type="number" name="perhour" value=<?php $Amount_per_hour ?> required><label>Amount Required Per Hour</label>
                    </div>

                    <!--<p class="p"><label>Upload Car Image</label></p>

                    <div class="imageUpload">
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title">Car Front</span>
                                <input type="file" name="carFront">
                            </label>
                        </div>
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title">Car Back</span>
                                <input type="file" name="carBack" id="images" accept="image/*" required>
                            </label>
                        </div>
                    </div>

                    <div class="imageUpload">
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title">Side View</span>
                                <input type="file" name="carSide" id="images" accept="image/*" required>
                            </label>
                        </div>
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title">Interior</span>
                                <input type="file" name="carInterior" id="images" accept="image/*" required>
                            </label>
                        </div>
                    </div>

                    <p class="p"><label>Upload Documents</label></p>

                    <div class="imageUpload">
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title" value=<?php echo $CRMV ?>>Certificat of Registration of Morter Vehicle</span>
                                <input type="file" name="CRMV" id="images" accept="image/*" required>
                            </label>
                        </div>
                        <div class="imgUpCard">
                            <label for="images" class="drop-container">
                                <span class="drop-title" value=<?php echo $VRL ?>>Vehicle Revenue Lisence</span>
                                <input type="file" name="VRL" id="images" accept="image/*" required>
                            </label>
                        </div>
                    </div>-->

                    <div class="textbox">
                        <textarea name="Description" value=<?php echo $Description_ ?>></textarea><label>Description</label>
                    </div>
    
                    <p class="p"><input type="checkbox" id="agree" name="agree" onclick="checkAgree()">
                    <label for="checkbox" >I Accept all privacy policy and terms</label></p><br/><br/>

                    <input type="submit" name="submit" id="submit" class="submit" value="Update">



                </form>
            </div>
        </center>


        <footer>
            <div class="footer">
                <div class="two">
                <img class="footerlogo" src="Images/Logo.png" alt="logo">
                <div class="footernav">
                    <ul class="nav" type="none">
                        <li class="navlist"><a href="">Home</a></li>
                        <li class="navlist"><a href="">Fleet</a></li>
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





