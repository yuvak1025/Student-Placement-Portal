<!DOCTYPE html>
<html>
<head>
	<title>Company Information Update</title>
    <style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
			
		}
		header {
            background-color: #003366;
            color: white;
            text-align: center;
			padding: 20px;
            display: flex;
            align-items: center;
			margin-top: -10px;
			margin-left: -10px;
			margin-right: -15px;
        }
		h1 {
            margin: 0;
			margin-left: 450px;
            flex: 1;
        }
        .logo {
            max-height: 80px;
            margin-right: 40px;
        }

		form {
			background-color: #fff;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			max-width: 600px;
			margin: 0 auto;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
			color: #555;
		}

		input[type="text"], input[type="password"], input[type="radio"] {
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 10px;
			color: #555;
		}

		input[type="radio"] {
			display: inline-block;
			width: auto;
			margin-right: 10px;
		}

		input[type="submit"] {
			background-color: #003366;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			font-size: 16px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #00796b;
		}

		#placementQuestions {
			margin-left: 20px;
			padding-left: 20px;
			border-left: 1px solid #ccc;
			display: none;
		}
        .side-nav {
		height: 100%;
		width: 150px;
		position: fixed;
		top: 98px;
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
	<h1>Company Information Update</h1>
    </centre>
    </header>
    <div class="side-nav">
	<a href="companyinfo.php">Home</a>
	<a href="company_update">Update Profile</a>
	<a href="applications.php">Applications</a>
	<a href="recruited.php">Recruited</a>
	<a href="companylogin.php">Logout</a>
</div>

	<form action="" method="post">
		<label for="company_name">Company Name:</label>
		<input type="text" name="company_name"><br>

		<label for="email">Email:</label>
		<input type="email" name="email"><br>

		<label for="password">Password:</label>
		<input type="password" name="password"><br>

		<label for="job_description">Job Description:</label>
		<textarea name="job_description"></textarea><br>

		<label for="role_offered">Role Offered to Students:</label>
		<input type="text" name="role_offered"><br>

		<label for="minimum_cpi">Minimum CPI:</label>
		<input type="numbers" name="minimum_cpi"><br>

		<label for="preferred_department">Preferred Department:</label>
		<input type="text" name="preferred_department"><br>

		<label for="essential_skills">Essential Skills Required:</label>
		<input type="text" name="essential_skills"><br>

		<label for="salary_package">Salary Package Offered:</label>
		<input type="number" name="salary_package"><br>

		<label for="mode_of_interview">Mode of Interview:</label>
		<input type="text" name="mode_of_interview"><br>

		<label for="recruiting_since">Recruiting Since:</label>
		<input type="number" name="recruiting_since"><br><br>

		<input type="submit" id="submit"name="submit" value="Submit">
	</form>
</body>
</html>

<?php
//Connect to MySQL server
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
//Get form data
$company_name = $_POST['company_name'];
$password = $_POST['password'];
$job_description = $_POST['job_description'];
$role_offered = $_POST['role_offered'];
$preferred_department = $_POST['preferred_department'];
$essential_skills = $_POST['essential_skills'];
$salary_package = $_POST['salary_package'];
$mode_of_interview = $_POST['mode_of_interview'];
$recruiting_since = $_POST['recruiting_since'];
$minimum_cpi = doubleval($_POST['minimum_cpi']);

//Update data into 'Company' table
$sql = "UPDATE Company SET company_name='$company_name', password='$password', job_description='$job_description', role_offered='$role_offered', preferred_department='$preferred_department', essentail_skills='$essential_skills', salary_package='$salary_package', mode_of_interview='$mode_of_interview', recruiting_since='$recruiting_since', minimum_cpi='$minimum_cpi' WHERE email = '".$_SESSION['email']."'";
$result = mysqli_query($conn,$sql);
if ($result) {
    // redirect to the login page
    header("Location: companyinfo.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

?> 