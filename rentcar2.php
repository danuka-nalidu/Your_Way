<?php
include('config.php');

$Car_ID = $_GET['id'];
?>

<html>
    <head>
        <title>rentcar</title>
        <link rel="stylesheet" href="rentcar.css"> 
        <script src ="rentcar.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<!--header-->
        <header>
            <a href=""><img class="logo" src="Images/Logo.png" alt="logo"></a>
            <div class="navigation">
                <ul class="nav" type="none">
                    <li class="navlist"><a href="index.php">Home</a></li>
                    <li class="navlist"><a  href="newfleetcustomer.php">Fleet</a></li>
                    <li class="navlist"><a href="">Support</a></li>
                    <li class="navlist"><a href="">About us</a></li>
                </ul>
            </div>
            <!--<div class="profiledetails">
                <img class="profilephoto" src="" alt="Profile Photo">
                    <p class="userdetails"><b>User Name</b><br/>
                    <font style="font-size: 12px;">User ID</font><br/>
                    <a class="edit" href="">edit profile</a></p>
            </div>-->
        </header>
<!--form-->
        <div class="form">
           <a href="newfleetcustomer.php"><button class="btn-close">&times;</button></a>
            <form class="registration"  action="rentcar.php" method="POST">

                <label for="Order">Review Order: <?php echo $Car_ID; ?> </label><br/><br><br>
                <div>

                </div>

                <label for="delivary">Where should we pickup and drop you off? </label><br><br>
                <textarea id="delivary" name=" Pickup_Location" placeholder="Pickup_Location"></textarea><br/><br/>
                <textarea id="delivary" name=" Dropoff_Location" placeholder="Dropoff_Location"></textarea><br/><br/>              
                
                <label for="mnumber">Mobile Number:</label>
                <input type="tel" id="delivary" name="Mobile_Number" pattern="[0-9]{10}" placeholder="" required><br/><br/>
                
                <label for="email">E-mail Adderss</label><br/>
                <input type="email" id="delivary" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="" required><br/><br/> 

                <label for="date">Rental Period:</label>
                <label for="date">From</label>
                <input type="datetime-local" id="from" name="Date_from" placeholder="From" required>
                <label for="date">Till</label>
                <input type="datetime-local" id="to" name="Date_till" placeholder="Till" required><br/><br/>

                <label for="date">Upload NIC:</label>
                <input type="file" name="NIC" accept=""><br><br>
                  
                <label for="pay">Pay with: </label>
                <input type="radio" id="Amex" name="Payment_method" value="Amex"><label for="Amex" >Amex</label>
                <input type="radio" id="Visa/Master" name="Payment_method" value="Visa/Master"><label for="Visa/Master" >Visa/Master</label><br/><br/>

                <div class="container">
                <fieldset>
                    <h3 id="payment">Enter Payment Details</h3>
                    
                        <!--<label for="cardholder_name">Cardholder Name:</label>-->
                        <input type="text" id="delivary" name="Cardholder_Name" placeholder="Cardholder Name" required>

                        <!--<label for="card_number" >Card Number:</label>-->
                        <input type="text" maxlength="16" id="delivary" name="Card_Number" placeholder="Card number" required><br>

                        <label for="exp_date" ><font style="font-size:15px;">Expired Date:<font></label><br>
                        <input type="datetime-local" id="delivary" name="expiration_date" placeholder="Expire Date" required>

                        <!--<label for="cvv">CVV:</label>-->
                        <input type="text" maxlength="3" id="delivary" name="cvv" placeholder="Enter your CVV" required>

                        <!--<label for="notes">Additional Comments:</label><br>-->
                        <textarea id="delivary" name="comments" placeholder="Additional Comments"></textarea>

                        </fieldset>
                </div>

                <input type="checkbox" id="agree" name="agree" onclick="checkAgree()">
                <label for="checkbox" >I Accept all privacy policy and terms</label><br/><br/>

                <input type="submit" value="Confirm & Pay" id="submit" name="submit" disabled="true">

                <input type="reset" value="Reset" id="delivary" name="reset">
            
            </form>
<!--footer
        </div>

        <footer>
            <div class="footer">
                <img class="footerlogo" src="Images/Logo.png" alt="logo">
                <div class="footernav">
                    <ul class="nav" type="none">
                        <li class="navlist"><a href="">Home</a></li>
                        <li class="navlist"><a href="">Fleet</a></li>
                        <li class="navlist"><a href="">Support</a></li>
                        <li class="navlist"><a href="">About us</a></li>
                    </ul>
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
        </footer>-->
    </body>
</html>