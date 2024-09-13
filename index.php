<?php
session_start();
// $_SESSION['AUTH'] = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Way car rental system</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.nrt/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/2ff3d0ccdf.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="container">
        <img id="main_pic" src="./images/brandnewlogo.png">

        <div class="menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="newfleet.php" id="link1">Fleet</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="aboutus.html">AboutUs</a></li>
            <?php 
            if(!isset($_SESSION['AUTH'])){
                ?>
            <li><a href="login_new.php" class="register">Login/Register</a></li>

        <?php
            }else{            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php 
            }
            ?>
        </ul>
    </div>

    <div class="side-pic">
        <img src="./images/bmw318.png" alt="First picture">
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

   <div class="home_name">
        <h1>
            <?php if(isset($_SESSION['USERNAME'])){ 
            echo "Hello," . $_SESSION['USERNAME']; 
            } 
            ?> 
            
        </h1>
        <p style="font-size: 20px;">Welcome to Your Way car rental system</p>
   </div>

    <div class="home">
        <div class="topic" id="topic">
                <h1 style="padding: 20px;"><span>Search and find your</span> <br>best car with a quick way</h1>
                <p style="padding: 20px; width:750px; text-align:justify;">Drive peformance and your cross-functional calloboration with easy-using dashboards and automated insights with one click.Amazing varieties of vehicles and feel a gorgeous experience.</p>
        <div class="booking">
            <button class="booking-button">BOOK NOW  <i class="fa-solid fa-phone"></i><box-icon type='solid' name='phone'></box-icon></button>
        </div>
    </div>
    <br/>
    <br/>
    <div class="logo-container">
        <img src="./images/benznlogo.png" class="logo" id="benz">
        <img src="./images/bmwNewlogo.png" class="logo" id="bmw">
        <img src="./images/toyotalogo.png" class="logo" id="toyota">
        <img src="./images/hondalogo.png" class="logo" id="honda">
        <img src="./images/tesla-logo-removebg-preview.png" class="logo" id="tesla">
        <img src="./images/audilogo.png" class="logo" id="audi">
        <img src="./images/mitsubishi logo.png" class="logo" id="mitsubishi">
        <img src="./images/hyhundailogo.png" class="logo" id="hyhundai">
    </div>
    
    <br/>
    <center>
        <div class="about" id="about">
            <div class="heading">
                <span>About Us</span>
                <h1>Best customer Experience</h1>   
            </div>
        </div>
    </center>

    <div class="about-container">
        <div class="about-img">
            <img src="./images/jeep.png" alt="jeep">
        </div>

        <div class="about-text">
            <span>About Us</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quae eius nemo sit mollitia magni sint adipisci quaerat provident quibusdam?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit commodi autem nihil laudantium perspiciatis!</p>
            <a href="#" class="about-btn">About more</a>
        </div>
    </div>  
    
    <div class="features" id="features">
        <div class="features-heading">
            <span>OUR SERVICE</span>
            <h1>We have best services and offers <br> for the rent cars</h1>
        </div>
    </div>

    <div class="container-features">
        <div class="quality quality1">
            <i class="fa-solid fa-users-line"></i>
            <h2>User Friendly</h2>
            <p>Designed to provide a seamless and enjoyable experience for customers with a aesthetically pleasing interface</p>
        </div>

        <div class="quality quality2">
            <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
            <h2>Cost Effectiveness</h2>
            <p>Designed to accommodate growth without significant expenses and friendly to the budget</p>
        </div>

        <div class="quality quality3">
            <i class="fa-sharp fa-solid fa-gauge-high"></i>
            <h2>Fast And Safe</h2>
            <p>Whole process is completed within 24 hours and ensures the security and privacy of customers</p>
        </div>
    </div>

    <div class="collection">
        <div class="collection_heading">
            <span>Best Matches</span>
            <h1>Our collection of cars</h1>
        </div>
       <div class="cars_container container">
            <div class="box">
                <img src="images/civic.jpg">
                <h2>Honda civic</h2>
                <h3>Rs.20000-30000</h3>
            </div>

            <div class="box">
                <img src="images/allion.jpg">
                <h2>Allion</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/chrnew.jpg">
                <h2>CHR</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/fortuner1.jpg">
                <h2>Fortuner</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/mazda1.jpg">
                <h2>Mazda</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/eclipse.jpg">
                <h2>Eclipse</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/hilux1.jpg">
                <h2>Hilux</h2>
                <span>Rs.20000-30000</span>
            </div>

            <div class="box">
                <img src="images/axio1.jpg">
                <h2>Axio</h2>
                <span>Rs.20000-30000</span>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="footer_Container">
            <div class="footer_picture">
                <img src="images/induwaraLogo.png" alt="Footer Picture">
                <div class="footer_Links">
                    <ul class="links" type="none">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="newfleet.php">Fleet</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="aboutus.html">About us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer_logo">
            <ul class="social_media_logo">
                <li><i class="fa-brands fa-whatsapp fa-fade"></i></li>
                <li><i class="fa-brands fa-twitter fa-fade"></i></li>
                <li><i class="fa-brands fa-linkedin fa-fade"></i></li>
                <li><i class="fa-brands fa-square-facebook fa-fade"></i></li>
                <li><i class="fa-brands fa-telegram fa-fade"></i></li>
                <li><i class="fa-solid fa-phone fa-fade"></i></li>
            </ul>
        </div>
        <center><p style="color: white; font-size: 15px; padding-top: 30px;padding-left: 50px;">Copyright @ 2023 Your Way Car rental Service - All rights reserved</p></center>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="script.js"></script>
</body>
</html>