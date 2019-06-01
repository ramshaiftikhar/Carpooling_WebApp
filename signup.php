<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Carpool1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$myName=$myPwd=$myEmail=$myMobile="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$myName=$_POST["name"];
	$myPwd=$_POST["pwd"];
	$myEmail=$_POST["email"];
	$myMobile=$_POST["mNumber"];
	$picture=$_POST['image_url'];
	$check = mysqli_query($conn,"SELECT * FROM Users WHERE Username = $myName && Password = $myPwd && Email= $myEmail");
	$checkrows = mysqli_num_rows($check);

	if(!$conn || $checkrows > 0){
		echo("Account already exists!");
		}
	else{ 

		$sql = "INSERT INTO Users(Username, Password, Email, Mobile, picture)
		VALUES ('$myName', '$myPwd', '$myEmail',$myMobile,'$picture')";
		if ($conn->query($sql) === TRUE) {
			$ret=mysqli_query($conn, "SELECT * FROM Users WHERE Username='$myName'") or die("Could not execute query: " .mysqli_error($conn));
			$row = mysqli_fetch_assoc($ret);
			$_SESSION['user_id'] = $row['user_id'];
			header('location:app.php');
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	}

$conn->close();
?>