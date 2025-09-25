<?php
$DB_USERNAME="root";
$DB_PASS="";
$DB_HOSTNAME="localhost";
$DB_NAME="astroveda"; //write name of your database
$conn=mysqli_connect($DB_HOSTNAME,$DB_USERNAME,$DB_PASS,$DB_NAME) or die('DATABASE CONNECTION ERROR');
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>