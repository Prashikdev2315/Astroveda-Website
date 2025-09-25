<?php
include('conn.php');

// Sanitize input data to prevent SQL injection
$CustEmail = mysqli_real_escape_string($conn, $_POST['custEmail']);
$astrologerEmail = mysqli_real_escape_string($conn, $_POST['astrologerEmail']);
$rating = mysqli_real_escape_string($conn, $_POST['rating']);
$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

// SQL query to insert data into the astrologer table
$sql = "INSERT INTO feedback (CustEmail, AstroEmail, Rating, Comments) VALUES ('$CustEmail', '$astrologerEmail', '$rating', '$feedback')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registration successful!');
        window.location.href = 'astroveda.html';
    </script>";
} else {
    echo "<script>
        alert('Failed registration. Please try again!');
        window.location.href = 'dummy.html';
    </script>";
}

// Close the database connection
$conn->close();
?><?php
// Start the session
session_start();

include('conn.php');

// Assuming User_ID is stored in the session after login
$CustEmail = $_SESSION['CustEmail'];

// Review details from the form
$rating = $_POST['Rating'];
$comments = $_POST['feedback'];
$AstroEmail = "abc@gmail.com";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert query
$sql = "INSERT INTO feedback (Rating, Comments, CustEmail, AstroEmail) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("dsii", $rating, $comments, $CustEmail, $AstroEmail);

if ($stmt->execute()) {
    echo "Review added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
