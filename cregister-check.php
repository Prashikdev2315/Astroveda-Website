<?php
include('conn.php');

// Sanitize input data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);

// SQL query to insert the data into the customer table
$sql = "INSERT INTO customer (CustName, CustEmail, CustPassword, CustPhone, CustGender, CustDOB) 
        VALUES ('$name', '$email', '$password', '$phone', '$gender', '$dob')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registration successful!');
        window.location.href = 'customer-login.html';
    </script>";
} else {
    echo "<script>
        alert('Failed registration. Please try again!');
        window.location.href = 'customer-register.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
