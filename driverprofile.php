<?php
session_start();

// Establish a connection to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "yourway";

$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$driverId = "";

$sql = "SELECT Driver_ID, username FROM driver"; // Assuming Driver_ID and username are the column names in the database table
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the driver's data
if ($row = $result->fetch_assoc()) {
  $driverId = $row['Driver_ID'];
  $username = $row['username'];
}

// Assuming your driver ID is stored in the $_SESSION['driver_id'] variable
if (isset($_SESSION['driver_id']) && !empty($_SESSION['driver_id'])) {
  $driverId = $_SESSION['driver_id'];
}

// Check if the delete button was clicked
if (isset($_POST['delete-profile'])) {
  // Start a transaction to delete data from both driver and driver_salary tables
  $conn->begin_transaction();

  try {
    // Prepare and bind the delete statement for the driver_salary table
    $deleteDriverSalaryStmt = $conn->prepare("DELETE FROM driver_salary WHERE Driver_ID = ?");
    $deleteDriverSalaryStmt->bind_param("s", $driverId);

    // Execute the delete statement for driver_salary
    $deleteDriverSalaryStmt->execute();

    // Close the prepared statement for driver_salary
    $deleteDriverSalaryStmt->close();

    // Prepare and bind the delete statement for the driver table
    $deleteDriverStmt = $conn->prepare("DELETE FROM driver WHERE Driver_ID = ?");
    $deleteDriverStmt->bind_param("s", $driverId);

    // Execute the delete statement for driver
    $deleteDriverStmt->execute();

    // Close the prepared statement for driver
    $deleteDriverStmt->close();

    // Commit the transaction
    $conn->commit();

    // Redirect to another page after deletion 
    header("Location: driverRegister.php");
    exit();
  } catch (Exception $e) {
    // An error occurred, rollback the transaction
    $conn->rollback();

    // Handle the error (e.g., display an error message)
    echo "Error: " . $e->getMessage();
  }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Driver Profile</title>
    <link rel="stylesheet" href="driverprofile.css">
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
            <?php echo "<img class='profilephoto' src=$VRL alt='Profile Photo'>"; ?>
            <p class="userdetails"><b><?php echo $username; ?></b><br/>
                <font style="font-size: 12px;">User ID: <?php echo $driverId; ?></font><br/>
                <a class="edit" href="">edit profile</a></p>
        </div>
    </header>-->

    <!------side navigation ------->
    <nav class="leftnav">
        <div class="sidebar">
            <a href="" class="listleftnav"><i class="fa fa-dashboard"></i>Dashboard</a>
            <a href="ridess.php" class="listleftnav"><i class="fa fa-Bell"></i>Ride Request</a>
            <a href="driverprofile.php" class="listleftnav"><i class="fa fa-list"></i>Edit/Delete profile</a>
            <a href="" class="listleftnav"><i class="fa fa-car"></i>Fleet</a>
            <a href="salary.php" class="listleftnav"><i class="fa fa-credit-card"></i>Salary Slip</a>
            <a href="" class="listleftnav"><i class="fa fa-star"></I>Feedback</a>
            <a href="" class="listleftnav"><i Class="fa fa-logout"></I>Log Out</a>
        </div>
    </nav>

    <div class="container">
        <div id="input-section">
            <h2>Driver Profile</h2>
            <form method="post" id="delete-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <label for="driver-id">Driver ID:</label>
                    <input type="text" name="driver-id" id="driver-id" placeholder="Enter driver ID" value="<?php echo $driverId; ?>" readonly>
                </div>
                <div class="form-row">
                    <label for="user-name">User Name:</label>
                    <input type="text" name="user-name" id="user-name" placeholder="Enter user name" value="<?php echo $username; ?>" readonly>
                </div>
                <div class="form-row">
            
                    <button type="submit" name="edit-profile" id="edit-button">Edit</button>
                    <button type="submit" name="delete-profile" id="delete-button" onclick="return confirm('Are you sure you want to delete the driver profile?')">Delete</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script src="driverprofile.js"></script>

    <<footer>
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
            <center>
                <p style="color: white; font-size: 13px;">&copy; 2023 Car Rental System. All Rights Reserved.</p>
            </center>
        </div>
    </footer>
</body>
</html>
