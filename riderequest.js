// Handle accept request button click
function acceptRequest() {
  // Perform logic to accept the ride request
  // This could include updating the database or performing other operations
  alert("Ride request accepted!");
}

// Handle delete request button click
function deleteRequest() {
  // Perform logic to delete the ride request
  // This could include updating the database or performing other operations
  if (confirm("Are you sure you want to delete this ride request?")) {
    alert("Ride request deleted!");
  }
}
