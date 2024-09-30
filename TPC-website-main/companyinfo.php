<?php
    // start the session to keep track of user login
    session_start();
    
    // check if the user is logged in, else redirect to login page
    if(!isset($_SESSION['email'])) {
        header('Location: companylogin.php');
        exit;
    }
    
    // connect to the database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "miniproject";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // retrieve company information from the database
    $sql = "SELECT company_name, email, job_description, role_offered, essential_skills, salary_package, recruiting_since FROM Company WHERE email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Company Info</title>
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
		<h1>Company Info</h1>
		</centre>
	</header>
    <div class="side-nav">
	<a href="companyinfo.php">Home</a>
	<a href="company_update.php">Update Profile</a>
	<a href="applications.php">Applications</a>
	<a href="recruited.php">Recruited</a>
	<a href="#" onclick="logout()">Logout</a>
  <script>
		function logout() {
			if (window.confirm("Are you sure you want to log out?")) {
				// Send request to server to invalidate session and log out user
				// ...
				alert("You have been logged out."); // Display a message to the user
				window.location.href = "logout.php"; // Redirect the user to the login page
			}
		}
	</script>
</div>

<table>
	<tr>
		<th>Company Name</th>
		<td><?php echo $row['company_name']; ?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?php echo $row['email']; ?></td>
	</tr>
	<tr>
		<th>Job Description</th>
		<td><?php echo $row['job_description']; ?></td>
	</tr>
	<tr>
		<th>Role Offered to Students</th>
		<td><?php echo $row['role_offered']; ?></td>
	</tr>
	<tr>
		<th>Essential Skills Required</th>
		<td><?php echo $row['essential_skills']; ?></td>
    </tr>
	<tr>
        <th>Salary Package Offered</th>
		<td><?php echo $row['salary_package']; ?></td>
    </tr>
	<tr>
        <th>Recruiting Since</th>
		<td><?php echo $row['recruiting_since']; ?></td>
        </tr>
	</table>
    </body>
</html>

<?php

//mysqli_close($conn);
?>