<?php
    include_once 'config.php';
 ?>

<?php
$sql="SELECT * from car ORDER BY Upload_On DESC";
$result = mysqli_query($conn, $sql);

$account="SELECT Customer_ID,Username from customer";
$cresult =  mysqli_query($conn, $account);


if ($cresult)
{
    $row = mysqli_fetch_assoc($cresult);
    $Customer_ID=$row['Customer_ID'];
    $Username=$row['Username'];
}
else
{
    echo "Error executing the query: " . mysqli_error($connection);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Customer_ID = $_POST["Customer_ID"];

    $checkSql = "SELECT * FROM customer WHERE Customer_ID = '$Customer_ID'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {

        $deleteSql = "DELETE FROM customer WHERE Customer_ID = '$Customer_ID'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<script>alert('Customer deleted successfully')</script>";
            echo "<script>window.location.href = 'newfleet.php';</script>";
        } else {
            echo "<script>alert('Delete process unsuccessfull')</script>";
        }
    } else {
        echo "<script>alert('Customer cannot be found!')</script>";
    }

    $conn->close();
}
?>
<html>
    <head>
        <title>Delete Customer</title>
        <link rel="stylesheet" href="header and footer\CarRentalSystem\Style\HeaderStyle.css"> 
        <link rel="stylesheet" href="newfleet.css"> 
        <link rel="stylesheet" href="deletecustomer.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Supplier</title>

    </head>
    <body>
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
            <div class="profiledetails">
                <img class="profilephoto" src="" alt="Profile Photo">
                    <p class="userdetails"><b><?php echo "$Username";?></b><br/>
                    <font style="font-size: 12px;"><?php echo "ID:"."$Customer_ID";?></font><br/>
                    <a class="edit" href="">edit profile</a></p>
            </div>
        </header>
<!--fleet-->
<div class = "dashboard">
    <nav class="left">
        <div class="container">   
        
        <a href='newfleetcustomer.php'><button class="btn"><i class='fa fa-dashboard'>  DASHBOARD</i></button></a>

        <ul id="list">
            <li><a href="#"><h2><i class='fas fa-car'> Available Brands </i></h2></a></li>
            <li><a href="#">Honda</a></li>
            <li><a href="#">Audi</a></li>
            <li><a href="#">BMW</a></li>
            <li><a href="#">Toyota</a></li>
            <li><a href="#">Benz</a></li>
        </ul>          
        
        <a href='history.php'><button class="btn"><i class='fas fa-hourglass-end'>  HISTORY</i></button></a><br><br>
        <a href='history.php'><button class="btn"><i class='far fa-trash-alt'>  DELETE ACCOUNT</i></button></a><br><br>

        </div>
    </nav>
    <nav class="right">
        <div class="container2">
            <form action="deletecustomer.php" method="post">
                <div class="user_details">
                    <div class="input_box">
                        <a href="#"><h2><i class='fas fa-warning'> Do you really want to delete your account? </i></h2></a><br><br>
                        <label class="details">Enter Customer ID  </label><br><br>
                        <input type="text" name="Customer_ID" placeholder="Customer ID" required><br>
                    </div>
                </div>
                <input type="submit" value="Delete" name="submit" class="button">
            </form>
        </div>
     </nav>
</div>
    <footer>
            <div class="footer">
                <div class="two">
                <img class="footerlogo" src="Images/Logo.png" alt="logo">
                <div class="footernav">
                    <ul class="nav" type="none">
                        <li class="navlist"><a href="index.php">Home</a></li>
                        <li class="navlist"><a href="newfleetcustomer.php">Fleet</a></li>
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