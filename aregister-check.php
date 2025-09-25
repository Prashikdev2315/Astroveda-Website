<?php
include('conn.php');

// Sanitize input data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

// SQL query to insert data into the astrologer table
$sql = "INSERT INTO astrologer (AstroName, AstroEmail, AstroPassword, AstroPhone, AstroGender, AstroSpecialization) 
        VALUES ('$name', '$email', '$password', '$phone', '$gender', '$specialization')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registration successful!');
        window.location.href = 'astrologer-login.html';
    </script>";
} else {
    echo "<script>
        alert('Failed registration. Please try again!');
        window.location.href = 'astrologer-register.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
