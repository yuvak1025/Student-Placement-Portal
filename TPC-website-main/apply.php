<?php
// Start session
session_start();

// Include database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get the rollNo from session
$rollNo = $_SESSION['rollNo'];

// Get the company email from the previous page
if (isset($_GET['email'])) {
	$email = $_GET['email'];
} else {
	// Redirect to viewcompanies page if email is not set
	header("Location: viewcompanies.php");
	exit();
}
$query = " select * from applications where rollNo='$rollNo' and email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==0)
    {
    $sql = "INSERT INTO applications (rollNo, email) VALUES ('$rollNo', '$email')";
    mysqli_query($conn, $sql);
      echo"<script>alert('Succesfully applied to this Company')</script>";

    }else
    {
        
        echo "<script>alert('Already applied to this Company')</script>";
       
    }

    

    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Button Example</title>
	<style>
		.centered-button {
			display: inline-block;
			background-color: #003366;
			color: white;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			font-weight: bold;
			border-radius: 5px;
			box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
			cursor: pointer;
			transition: all 0.3s ease;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.centered-button:hover {
			background-color: #00796b;
			box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
		}
	</style>
</head>
<body>
	<form method="get" action="viewcompanies.php">
		<button class="centered-button">Go back</button>
	</form>
</body>
</html>
