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
		<h1>Applications</h1>
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
		// Start session
		session_start();

		// Include database connection
		$servername = "localhost:3307";
		$username = "root";
		$password = "";
		$dbname = "miniproject";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Get the company email from session
		$email = $_SESSION['email'];

		// Get the students who applied to this company with their rollNo
		$sql = "SELECT rollNo FROM applications WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$applicants = array();
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$applicants[] = $row['rollNo'];
			}
		}

		// Get the students with cpi >= minimum_cpi from Students table
		$sql = "SELECT * FROM Students WHERE (rollNo in (SELECT rollno FROM applications WHERE email='$email')) and cpi >= (SELECT minimum_cpi FROM Company WHERE email='$email')";
		$result = mysqli_query($conn, $sql);
		$eligible_students = array();
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$eligible_students[] = $row;
				if (in_array($row['rollNo'], $applicants)) {
					// Mark the student as an applicant
					$eligible_students[count($eligible_students) - 1]['applied'] = true;
				}
			}
		}

		// Get the students with cpi < minimum_cpi from Students table
		$sql = "SELECT * FROM Students WHERE (rollNo in (SELECT rollno FROM applications WHERE email='$email')) and cpi < (SELECT minimum_cpi FROM Company WHERE email='$email')";
		$result = mysqli_query($conn, $sql);
		$ineligible_students = array();
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$ineligible_students[] = $row;
				if (in_array($row['rollNo'], $applicants)) {
					// Mark the student as an applicant
					$ineligible_students[count($ineligible_students) - 1]['applied'] = true;
				}
			}
		}

		// Display the tables
		echo "<h2>Eligible Students</h2>";
		echo "<table>";
		echo "<tr><th>Roll No</th><th>Name</th><th>CPI</th><th>Branch</th><th>Year</th><th>Placement Status</th><th>Applied</th><th>Accept</th><th>Reject</th></tr>";
		foreach ($eligible_students as $student) {
			echo "<tr>";
			echo "<td>".$student['rollNo']."</td>";
			echo "<td>".$student['name']."</td>";
			echo "<td>".$student['cpi']."</td>";
			echo "<td>".$student['branch']."</td>";
            echo "<td>".$student['year']."</td>";
            echo "<td>".$student['placementStatus']."</td>";
            echo "<td>".(isset($student['applied']) ? "Yes" : "No")."</td>";
			echo "<td><a href='accept.php?id=" . $student['rollNo'] . "'>Accept</a></td>";
            echo "<td><a href='reject.php?id=" . $student['rollNo'] . "'>Reject</a></td>";
            echo "</tr>";
        }
        echo "</table>";
		echo "<h2>Ineligible Students</h2>";
	echo "<table>";
	echo "<tr><th>Roll No</th><th>Name</th><th>CPI</th><th>Branch</th><th>Year</th><th>Placement Status</th><th>Applied</th><th>Accept</th><th>Reject</th></tr>";
	foreach ($ineligible_students as $student) {
		echo "<tr>";
		echo "<td>".$student['rollNo']."</td>";
		echo "<td>".$student['name']."</td>";
		echo "<td>".$student['cpi']."</td>";
		echo "<td>".$student['branch']."</td>";
        echo "<td>".$student['year']."</td>";
        echo "<td>".$student['placementStatus']."</td>";
        echo "<td>".(isset($student['applied']) ? "Yes" : "No")."</td>";
		echo "<td><a href='accept.php?id=" . $student['rollNo'] . "'>Accept</a></td>";
        echo "<td><a href='reject.php?id=" . $student['rollNo'] . "'>Reject</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    
        ?>