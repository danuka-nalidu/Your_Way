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

// Function to add the charges per hour column
function addChargesPerHourColumn($conn) {
    // Prepare the alter table statement
    $sql = "ALTER TABLE driver ADD COLUMN Payment_per_hour INT(20)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Column Payment_per_hour added successfully.');</script>";
    } else {
        echo "Error adding column Payment_per_hour: " . $conn->error;
    }
}

// Function to insert data into Payment_per_hour column
function insertPaymentPerHourData($conn, $paymentPerHour) {
    // Prepare and bind the insert statement
    $stmt = $conn->prepare("UPDATE driver SET Payment_per_hour = ?");
    $stmt->bind_param("i", $paymentPerHour);

    // Execute the insert statement
    if ($stmt->execute()) {
        echo "<script>alert('Payment_per_hour data inserted successfully.');</script>";
    } else {
        echo "Error inserting Payment_per_hour data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Function to fetch and display ride request details from the database
function fetchRideRequests($conn) {
    // Query to retrieve the data from the table
    $sql = "SELECT Rental_ID, Pickup_Location, Dropoff_Location, Date_from, Date_till, Car_ID, Driver_ID FROM requisition";

    // Execute the query and fetch the result
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<div class='ride-details'>";
            while ($row = $result->fetch_assoc()) {
                $rentalId = $row['Rental_ID'];
                $pickupLocation = $row['Pickup_Location'];
                $dropoffLocation = $row['Dropoff_Location'];
                $DateFrom = $row['Date_from'];
                $DateTill = $row['Date_till'];
                $carId = $row['Car_ID'];
                $driverId = $row['Driver_ID'];

                // Display the fetched data
                echo "<div class='ride-details'>";
                echo "<h2>Ride Details - Rental ID: $rentalId</h2>";
                echo "<p>Car ID: $carId</p>";
                echo "<p>Pickup Location: $pickupLocation</p>";
                echo "<p>Dropoff Location: $dropoffLocation</p>";
                echo "<p>Date from: $DateFrom</p>";
                echo "<p>Date till: $DateTill</p>";

                echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
                echo "<input type='hidden' name='rentalId' value='$rentalId'>";
                echo "<button type='submit' name='delete' class='delete-button'>Delete</button>";
                echo "<button type='submit' name='return' class='status-button'>Return</button>";
                echo "<button type='submit' name='accept' class='accept-button'>Accept</button>";
                echo "</form>";
                echo "</div>";
                
            }
            echo "</div>";
        } else {
            echo "No ride requests found.";
        }
        $result->free();
    } else {
        echo "Error fetching ride requests: " . $conn->error;
    }
}

// Function to update the ride request status
function updateRideRequestStatus($conn, $rentalId, $action) {
    // Prepare and bind the update statement
    if ($action === "delete") {
        $stmt = $conn->prepare("UPDATE requisition SET Driver_ID = 0 WHERE Rental_ID = ?");
    } elseif ($action === "return") {
        $stmt = $conn->prepare("UPDATE requisition SET Rental_Status = 'Return' WHERE Rental_ID = ?");
    }
    $stmt->bind_param("i", $rentalId);

    // Execute the update statement
    if ($stmt->execute()) {
        if ($action === "delete") {
            echo "<script>alert('Ride request deleted successfully.');</script>";
        } elseif ($action === "return") {
            echo "<script>alert('Ride request status updated to Return.');</script>";
        }
    } else {
        echo "Error updating ride request: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Check if the delete form is submitted
if (isset($_POST['delete'])) {
    $rentalId = $_POST['rentalId'];
    updateRideRequestStatus($conn, $rentalId, "delete");
}

// Check if the status form is submitted
if (isset($_POST['return'])) {
    $rentalId = $_POST['rentalId'];
    updateRideRequestStatus($conn, $rentalId, "return");
}

// Check if the accept form is submitted
if (isset($_POST['accept'])) {
    addChargesPerHourColumn($conn);
    insertPaymentPerHourData($conn, 500); // Replace 50 with the desired payment per hour value
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Driver Ride Request</title>
        <link rel="stylesheet" href="riderequest.css">
        <link rel="stylesheet" href="ridess.php">
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
    <h1>Driver Ride Request</h1>
    <div class="ride-details">
        <?php fetchRideRequests($conn); ?>
    </div>
    <?php if (!isset($_POST['accept'])) { ?>
        <div class="create-column">
            <h2>Create Payment_Per_hour Column</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <button type="submit" name="createColumn">Create Payment_Per_hour Column</button>
            </form>
        </div>
    <?php } ?>
    <div class="insert-data">
        <h2>Insert Payment_Per_hour Data</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="paymentPerHour">Payment Per Hour:</label>
            <input type="text" id="paymentPerHour" name="paymentPerHour" required>
            <button type="submit" name="insertData">Insert Data</button>
        </form>
    </div>
    </div>

<script src="riderequest.js"></script>


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