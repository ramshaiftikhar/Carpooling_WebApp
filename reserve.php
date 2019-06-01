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

$userId = $row['user_id'];

$initLoc = $_POST['ride-init'];
$destin = $_POST['ride-dest'];
$dep = $_POST['ride-depart'];

$result = mysqli_query($conn, "SELECT * FROM Ride WHERE (user_id = '$userId') and (initialLocation='$initLoc') and (destination = '$destin') and (depart='$dep')") or die("Could not execute query: " .mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

$ride_ID = $row['ride_id'];
$result = mysqli_query($conn, "DELETE FROM Favourite WHERE ride_id='$ride_ID'") or die("Could not execute query: " .mysqli_error($conn));

$result = mysqli_query($conn, "DELETE FROM Ride WHERE ride_id='$ride_ID'") or die("Could not execute query: " .mysqli_error($conn));

header('location:app.php');


 ?>