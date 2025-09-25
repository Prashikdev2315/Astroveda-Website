<?php
include('conn.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $type = $_POST['poojatype'];
    $date = $_POST['poojadate'];
    $venue = $_POST['poojavenue'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Get Cu_ID based on email
        $stmt = $conn->prepare("SELECT CustID FROM customer WHERE CustEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($cu_id);
        $stmt->fetch();
        $stmt->close();

        if ($cu_id) {
            // Insert into Pooja_Booking
            $stmt = $conn->prepare("INSERT INTO pooja_booking (CustID, Type, Date, Venue) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $cu_id, $type, $date, $venue);
            $stmt->execute();
            $stmt->close();

            // Commit the transaction
            $conn->commit();

            echo "<script>
        alert('Booking successful!');
        window.location.href = 'astroveda.html';
    </script>";
            exit();
        } else {
            echo "<script>
            alert('Failed Booking. Please try again!');
            window.location.href = 'pooja-booking.html';
        </script>";        }
    } catch (Exception $e) {
        // If something goes wrong, rollback the transaction
        $conn->rollback();
        echo "Failed to book pooja: " . $e->getMessage();
    }
}
?>
