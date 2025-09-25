
<?php
  include('conn.php');

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    $sql = "INSERT INTO customer (CustName, CustEmail, CustPassword, CustPhone, CustGender, CustDOB) VALUES ('$name', '$email', '$password', '$phone', '$gender', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>