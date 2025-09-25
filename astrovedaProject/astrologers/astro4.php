<?php
include('conn.php'); // Include the database connection file

// Query to fetch rows with status = 1 from the Pooja_Booking table
$sql = "SELECT a.*,AVG(f.Rating) AS AverageRating FROM astrologer a JOIN feedback f ON a.AstroEmail = f.AstroEmail GROUP BY a.AstroEmail;";
$result = $conn->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Astrologers - Astroveda</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Style for table rows */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9d16f;
            color: black;
        }
    </style>
</head>
<body>

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
        <h1>All Astrologers</h1>
        <?php
        // Check if there are results
        if ($result->num_rows > 0) {
            // Start the table and define the headers
            echo "<table>";
            echo "<tr><th>Name</th><th>Email ID</th><th>Gender</th><th>Specialization</th><th>Phone Number</th><th>Rating</th></tr>";

            // Loop through and display each row from the query result
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["AstroName"] . "</td>
                        <td>" . $row["AstroEmail"] . "</td>
                        <td>" . $row["AstroGender"] . "</td>
                        <td>" . $row["AstroSpecialization"] . "</td>
                        <td>" . $row["AstroPhone"] . "</td>
                        <td>" . $row["AverageRating"] . "</td>

                    </tr>";
            }

            // End the table
            echo "</table>";
        } else {
            echo "<p>No Astrologers Found</p>";
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
