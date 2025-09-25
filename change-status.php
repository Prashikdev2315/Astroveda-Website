<?php
// Include the database connection file
include('conn.php');

// Check if booking_id is set in POST request
if(isset($_POST['BookingID'])) {
    // Get the booking_id from the POST request
    $booking_id = $_POST['BookingID'];

    // Update the status to 0 for the specific booking
    $query = "UPDATE pooja_booking SET Status = 'not pending' WHERE BookingID = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $booking_id);  // "i" is for integer type
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            // Status update was successful, show success alert
            echo "<script type='text/javascript'>
                    alert('Status updated successfully.');
                    window.location.href = 'astrologer-main-page.html';  // Redirect to astrologer main page after the alert
                  </script>";
        } else {
            // Status update failed, show error alert
            echo "<script type='text/javascript'>
                    alert('Failed to update the status.');
                    window.location.href = 'astrologer-main-page.html';  // Redirect to astrologer main page after the alert
                  </script>";
        }
        $stmt->close();
    } else {
        // Error preparing query, show error alert
        echo "<script type='text/javascript'>
                alert('Error preparing the query.');
                window.location.href = 'astrologer-main-page.html';  // Redirect to astrologer main page after the alert
              </script>";
    }
} else {
    // No booking ID provided, show error alert
    echo "<script type='text/javascript'>
            alert('No booking ID provided.');
            window.location.href = 'astrologer-main-page.html';  // Redirect to astrologer main page after the alert
          </script>";
}

// Close the database connection
$conn->close();
?>
