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

$rider_type = $_POST["rider-type"];
$_SESSION['ridertype']= $rider_type;
$initialLocation = $_POST["from"];
$_SESSION['initialLocation'] = $initialLocation;
$destination = $_POST["to"];
$_SESSION['destination'] = $destination;
$depart = $_POST["depart"];
$_SESSION['depart'] = $depart;
$ride_type = $_POST["ride-type"];
$_SESSION['ride_type'] = $ride_type;
$user_id = $_SESSION['user_id'];
$_SESSION['user_id']= $user_id;

if($rider_type=="driver"){
$sql = "INSERT INTO Ride(rider_type,initialLocation,destination,depart,ride_type, user_id) VALUES ('$rider_type','$initialLocation','$destination','$depart','$ride_type','$user_id')";


if (mysqli_query($conn, $sql)) {
	header("location:app.php");
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location:app.php");
}
header("location:app.php");
}
header("location:app.php");
mysqli_close($conn);
?>