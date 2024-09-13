<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yourway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve driver's salary data
// Retrieve driver's salary data
$sql = "SELECT Driver_ID FROM driver"; // Assuming Driver_ID is the column name in the database table
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$driverId = $row['Driver_ID'];

//$driverId = 1; 

// Retrieve payment history
$paymentHistory = [];
$sql = "SELECT Amount, date, Trip_Details FROM driver_salary WHERE Driver_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $driverId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $paymentHistory[] = $row;
}

// Retrieve payment information
$sql = "SELECT Payment_Method, Bank_Account, Account_Holder FROM driver WHERE Driver_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $driverId);
$stmt->execute();
$result = $stmt->get_result();
$paymentInfo = $result->fetch_assoc();

$paymentMethod = $paymentInfo['Payment_Method'];
$bankAccount = $paymentInfo['Bank_Account'];
$accountHolder = $paymentInfo['Account_Holder'];

// Calculate total earnings
$totalEarnings = 0;
foreach ($paymentHistory as $payment) {
    $totalEarnings += $payment['Amount'];
}

// Update Payment Info
if (isset($_POST['update-payment'])) {
    $paymentMethod = $_POST['Payment_Method'];
    $bankAccount = $_POST['Bank_Account'];
    $accountHolder = $_POST['Account_Holder'];

    $sql = "UPDATE driver SET Payment_Method = ?, Bank_Account = ?, Account_Holder = ? WHERE Driver_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $paymentMethod, $bankAccount, $accountHolder, $driverId);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<html>
    <head>
        <title>Driver's Salary Slip</title>
        <link rel="stylesheet"  href="salaryy.css">
        <link rel="stylesheet" href="salary.php">
        <link rel="stylesheet" href="Style/HeaderStyle.css">
        <link rel="stylesheet" href="driverdashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>





        <!-----header------->

        <header>
            <a href=""><img class="logo" src="Images/Logo.png" alt="logo"></a>
            <div class="navigation">
                <ul class="nav" type="none">
                        <li class="navlist"><a href="">Fleet</a></li>
                        <li class="navlist"><a href="">Support</a></li>
                        <li class="navlist"><a href="">About us</a></li>
                        <li class="navlist"><a href="">Contact us</a></li>
                </ul>
            </div>
            <div class="profiledetails">-->
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
                <a href="" class="listleftnav"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="ridess.php" class="listleftnav"><i Class="fa fa-Bell"></i>Ride Request</a>
                <a href="driverprofile.php" class="listleftnav"><i Class="fa fa-list"></i>Edit/Delete profile</a>
                <a href="" class="listleftnav"><i Class="fa fa-car"></i>Fleet</a>
                <a href="salary.php" class="listleftnav"><i Class="fa fa-credit-card"></i>Salary Slip</a>
                <a href="" class="listleftnav"><i Class="fa fa-star"></I>Feedback</a>
                <a href="" class="listleftnav"><i Class="fa fa-logout"></I>Log Out</a>
            </div>
        </nav> 
        <div class="container">
    <h1>Driver's Salary Slip</h1>

    <div class="section" id="total-earning">
            <!-- Total Earning section -->
            <h2>Total Earning</h2>
            <p id="total-earning-value">$<?php echo $totalEarnings; ?></p>
        </div>
        


<div class="section" id="payment-history">
        <!-- Payment History section -->
        <h2>Payment History</h2>
        <!-- Rest of the HTML code -->

        <table id="payment-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Trip Details</th>
                <th>Earned</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($paymentHistory as $payment) { ?>
                <tr>
                    <td><?php echo $payment['date']; ?></td>
                    <td><?php echo $payment['Trip_Details']; ?></td>
                    <td><?php echo $payment['Amount']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="section" id="payment-info">
        <!-- Payment Information section -->
        <h2>Payment Information</h2>
        <!-- Rest of the HTML code -->

        <form id="payment-form" method="POST" action="salary.php">
            <div class="form-row">
                <label for="payment-method">Payment Method:</label>
                <input type="text" id="payment-method" name="Payment_Method"
                       value="<?php echo $paymentMethod; ?>">
            </div>
            <div class="form-row">
                <label for="bank-account">Bank Account:</label>
                <input type="text" id="bank-account" name="Bank_Account"
                       value="<?php echo $bankAccount; ?>">
            </div>
            <div class="form-row">
                <label for="account-holder">Account Holder:</label>
                <input type="text" id="account-holder" name="Account_Holder"
                       value="<?php echo $accountHolder; ?>">
            </div>
            <div class="form-row">
                <input type="hidden" id="driver-id-input" name="Driver_ID" value="<?php echo $driverId; ?>">
                <button type="submit" id="update-payment" name="update-payment">Update Payment Info</button>
            </div>
        </form>

        
    </div>
    </div>
</div>

<script src="driverpayment.js"></script>

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

        <center><p style="color: white; font-size: 15px;">Copyright @ 2023 Your Way Car rental Service - All rights
                reserved</p></center>

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


</html>-->

<?php
// Close the database connection
$conn->close();
?>