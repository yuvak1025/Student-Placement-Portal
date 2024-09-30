<!DOCTYPE html>
<html>
<head>
	<title>Applications</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}
        header {
		background-color: #003366;
		color: white;
		padding: 20px;
		text-align: center;
		height: 60px;
	}

	h1 {
		margin-top: -45px;
	}
	h2 {
		margin-left:650px;
	}
	.logo {
            max-height: 80px;
            margin-right: 1500px;
        }
	table {
		border-collapse: collapse;
		margin: 30px auto;
		width: 50%;
	}

	th, td {
		padding: 10px;
		border: 1px solid black;
		text-align: left;
	}

	.side-nav {
		height: 100%;
		width: 150px;
		position: fixed;
		top: 100px;
		left: 0;
		background-color: #f1f1f1;
		overflow-x: hidden;
		padding-top: 20px;
	}

	.side-nav a {
		padding: 20px 10px 20px 16px;
		text-decoration: none;
		font-size: 18px;
		color: #003366;
		display: block;
		transition: 0.3s;
	}

	.side-nav a:hover {
		background-color: #003366;
		color: white;
	}
</style>
</head>
<body>
<header>
	<img src="iit_patna_logo.png" alt="IIT Patna Logo" class="logo" width=60px height=60px>
		<centre>
		<h1>Recruited</h1>
		</centre>
	</header>
    <div class="side-nav">
	<a href="companyinfo.php">Home</a>
	<a href="company_update.php">Update Profile</a>
	<a href="applications.php">Applications</a>
	<a href="recruited.php">Recruited</a>
	<a href="companylogin.php">Logout</a>
</div>

<?php
session_start();
// Assuming you have already established a database connection
// and selected the appropriate database
// Include database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
// Prepare a SELECT query to fetch the matching information from the database
$sql = "SELECT c.name, s.* FROM Company c INNER JOIN Students2 s ON c.name = s.company_name WHERE c.email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();

// Get the results of the query
$result = $stmt->get_result();
*/
$email=$_SESSION['email'];
$sql="select * from Students where rollNo in(select rollNo from Students2 where companyName=(select company_name from Company where email='$email'))";
$result=mysqli_query($conn,$sql);
// Check for errors
if (!$result) {
    die("Error: " . $conn->error);
}

// Display the matching information to the user
echo "<h2>Recruited Information:</h2>";
echo "<table>";
echo "<tr><th>Student Name</th><th>Roll No</th><th>Branch</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['rollNo'] . "</td><td>" . $row['branch'] . "</td></tr>";
}

echo "</table>";

?>

