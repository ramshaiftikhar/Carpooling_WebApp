<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Carpool1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['ride-id'];

$result = mysqli_query($conn, "SELECT * FROM Users WHERE Email='$email'") or die("Could not execute query: " .mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$_SESSION['imageURL'] = $row['picture'];
$_SESSION['dest-rider'] = $_POST['ride-dest'];
$_SESSION['dest-depart']= $_POST['ride-depart'];
$_SESSION['dest-user']= $_POST['ride-user'];


header('location: rider.php');
 ?>