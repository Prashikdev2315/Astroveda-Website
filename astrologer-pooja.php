<?php
include('conn.php'); // Include the database connection file

// Query to fetch rows with status = 'pending' from the Pooja_Booking table
$sql = "SELECT pooja_booking.*, customer.CustName 
        FROM pooja_booking, customer 
        WHERE pooja_booking.Status = 'pending' 
        AND pooja_booking.CustID = customer.CustID"; // Added WHERE clause to filter by status
$result = $conn->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Bookings - Astroveda</title>
    <style>
        /* General reset and styling */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }
        body {
            background: linear-gradient(to bottom, #e9d16f, #e9d16f80);
            min-height: 100vh;
        }
        .header {
            background-color: black;
            color: #e9d16f;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        #header1 img {
            width: 73px;
            height: 73px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        
        #header2 h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 15px;
            padding-right: 479px; 
            align-items: center; 
            color: #e9d16f;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .logo {
            width: 48px;
            height: 48px;
            background-color: white;
            border-radius: 50%;
        }
        .site-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        footer {
            background-color: black;
            color: #e9d16f;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Table styling */
        .table-container {
            background-color: #f5f5f5; /* A slightly darker shade than the page background */
            border-radius: 12px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for a lifted effect */
            margin: 20px 0; /* Space around the table */
            overflow: hidden; /* To ensure rounded corners are visible */
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Makes sure there are no gaps between borders */
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Light border for separation */
        }

        th {
            background-color: #e9d16f; /* Golden color for header */
            color: black;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f4f4f4; /* Light gray background on row hover */
        }

        td {
            color: #333;
        }

        /* Button styling */
        .btn-confirm {
            background-color: white;
            color: black;
            border: 2px solid #e9d16f; /* Golden color border */
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none; /* Remove underline from the link */
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-confirm:hover {
            background-color: #e9d16f; /* Golden background on hover */
            color: white;
            transform: translateY(-3px); /* Slightly lift the button on hover */
        }
    </style>
</head>
<body>

<header>
<div class="header">
            <div id="header1">
                <img src="https://cdn.dribbble.com/userupload/11803040/file/original-045b55481072df727872aa7f326848ac.jpg?resize=400x300&vertical=center" width="150px" style="border-radius: 50%; object-fit: cover;">
            </div>
            <div id="header2" style="padding-right: 40px; margin-right: 100px;">
                <h1><big>ASTROVEDA</big></h1>
            </div>
        </div>
        <br /><br />

<main>
    <div class="container">
        <h1>Pooja Bookings</h1>
        <?php
        // Check if there are results
        if ($result->num_rows > 0) {
            // Start the table and define the headers
            echo "<table>";
            echo "<tr><th>Booking ID</th><th>Customer Name</th><th>Type</th><th>Meeting Date</th><th>Venue</th><th></th></tr>";

            // Loop through and display each row from the query result
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["BookingID"] . "</td>
                        <td>" . $row["CustName"] . "</td>
                        <td>" . $row["Type"] . "</td>
                        <td>" . $row["Date"] . "</td>
                        <td>" . $row["Venue"] . "</td>
                        <td>
                        <!-- Confirm button with form action to change-status.php -->
                        <form action='change-status.php' method='POST'>
                        <input type='hidden' name='BookingID' value='" . $row["BookingID"] . "'>
                        <button type='submit' class='btn-confirm'>Confirm</button>
                        </form>
                        </td>
                    </tr>";
            }

            // End the table
            echo "</table>";
        } else {
            echo "<p>No pooja bookings found with status 'pending'.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</main>

<footer>
    <p>Powered by Astroveda</p>
</footer>

</body>
</html>
