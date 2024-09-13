

// Function to handle the edit button click event
function handleEditButtonClick() {
    // Get the input values
    var driverID = document.getElementById("driver-id").value;
    var userName = document.getElementById("user-name").value;
    var password = document.getElementById("password").value;
  
    // Perform validation or additional logic if needed
  
    // Display an alert with the updated values
    alert(
      "Driver ID: " + driverID + "\nUser Name: " + userName + "\nPassword: " + password
    );
  
    // Clear the input fields
    document.getElementById("driver-id").value = "";
    document.getElementById("user-name").value = "";
    document.getElementById("password").value = "";
  }
  
  // Add event listeners to the buttons
  document.getElementById("edit-button").addEventListener("click", handleEditButtonClick);
  
  // Function to handle the delete button click event
  function handleDeleteButtonClick() {
    // Get the input value
    var driverID = document.getElementById("driver-id").value;
  
    // Perform validation or additional logic if needed
  
    // Display a confirmation dialog
    var confirmation = confirm("Are you sure you want to delete this driver profile?");
  
    // Check if the user confirmed the deletion
    if (confirmation) {
      // Perform the delete operation
      // You can send an AJAX request to the server to delete the driver profile
  
      // Display a success message
      alert("Driver profile deleted successfully.");
  
      // Clear the input fields
      document.getElementById("driver-id").value = "";
      document.getElementById("user-name").value = "";
      document.getElementById("password").value = "";
    }
  }
  
  // Add event listener to the delete button
  document.getElementById("delete-button").addEventListener("click", handleDeleteButtonClick);
  