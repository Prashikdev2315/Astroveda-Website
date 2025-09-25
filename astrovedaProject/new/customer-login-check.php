<?php
// Start session
session_start();

include('conn.php'); // Assuming conn.php contains the database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT CustID, CustName, CustPassword FROM customer WHERE CustEmail = ?");
    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the email exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if ($password === $row['CustPassword']) {
            // Password matches, login successful
            $_SESSION['user_id'] = $row['CustID'];
            $_SESSION['user_name'] = $row['CustName'];

            // Redirect to main page
            header("Location: main.html");
            exit();
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid credentials. Please try again!";
            header("Location: customer-login.html");
            exit();
        }
    } else {
        // No user found with this email
        $_SESSION['error_message'] = "Invalid credentials. Please try again!";
        header("Location: customer-login.html");
        exit();
    }

    // Close the statement
    $stmt->close();
}
?>
