<?php
  include('conn.php');
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

    $sql = "INSERT INTO astrologer (AstroName, AstroEmail, AstroPassword, AstroPhone, AstroGender, AstroSpecialization) VALUES ('$name', '$email', '$password', '$phone', '$gender', '$specialization')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>