<!DOCTYPE html>
<html>
<head>
	<title>Your Applications</title>
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
		<h1>Your Applications</h1>
		</centre>
	</header>
    <div class="side-nav">
	<a href="studentinfo.php">Home</a>
	<a href="updateprofile.php">Update Profile</a>
	<a href="viewcompanies.php">View Companies</a>
    <a href="applied.php">Applied</a>
	<a href="studlogin.php">Logout</a>
</div>
<?php
session_start();

// Check if rollNo is set in session
if (!isset($_SESSION['rollNo'])) {
    // Redirect to "studlogin" page
    header("Location: studlogin.php");
    exit;
}

// Connect to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$rollNo = $_SESSION['rollNo'];
// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a SELECT query to fetch the company details for the current user
$sql = "SELECT c.* FROM Company c INNER JOIN applications a ON c.email = a.email WHERE a.rollNo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['rollNo']);
$stmt->execute();

// Get the results of the query
$result = $stmt->get_result();

// Check for errors
if (!$result) {
    die("Error: " . $conn->error);
}

// Display the company details to the user
echo "<h2>Your Applications:</h2>";
echo "<table>";
echo "<tr><th>Company Name</th><th>Email</th><th>Job Role</th><th>Salary package </th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['company_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['role_offered'] . "</td><td>" . $row['salary_package'] . "</td></tr>";
}

echo "</table>";
mysqli_close($conn);
?>

