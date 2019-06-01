<?php
session_start();
if( isset($_POST['user']) and isset($_POST['pwd']) ) {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Carpool1";
	$error = "";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

		$name=$_POST['user'];
		$password=$_POST['pwd'];
		$ret=mysqli_query( $conn, "SELECT * FROM Users WHERE Username='$name' AND Password= '$password' ") or die("Could not execute query: " .mysqli_error($conn));
		
		$row = mysqli_fetch_assoc($ret);
		if(!$row) {
			$error = "Invalid username or password";
			header('location:index.php'); }
		else{
			$_SESSION["user_id"] = $row['user_id'];
			header('location: app.php');
		}
}
?>