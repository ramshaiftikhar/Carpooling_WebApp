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
$email = $_POST['ride-em'];

$result = mysqli_query($conn, "SELECT * FROM Users WHERE Email='$email'") or die("Could not execute query: " .mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

$userId = $row['user_id'];
$initLoc = $_POST['ride-init'];
$destin = $_POST['ride-dest'];
$dep = $_POST['ride-depart'];
$pic = $_POST['ride-pic'];
$user = $_POST['ride-user'];
$mob = $_POST['ride-mob'];

$result = mysqli_query($conn, "SELECT * FROM Ride WHERE (user_id = '$userId') and (initialLocation='$initLoc') and (destination = '$destin') and (depart='$dep')") or die("Could not execute query: " .mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$ride_ID = $row['ride_id'];
$user_id = $_SESSION['user_id'];
$sql = "Insert into Favourite(ride_id, initialLocation, destination, depart, Username, Mobile, Email, picture, user_id) values ('$ride_ID', '$initLoc', '$destin', '$dep', '$user', '$mob', '$email', '$pic', '$user_id')";

if (mysqli_query($conn, $sql)) {

	header("location:app.php");

}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 ?>