<!DOCTYPE html>
<html>
<head>

	<title>Update Personal Profile</title>
	<style>
		body {
			margin: 0;
			padding: 0;
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
		.side-nav {
			height: 100%;
			width: 150px;
			position: fixed;
			top: 90px;
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
	</style>
</head>
<body>
<header>
        <img src="iit_patna_logo.png" alt="IIT Patna Logo" class="logo" width=60px height=60px>
		<centre>
	<h1>Update Personal Profile</h1>
    </centre>
    </header>
	<div class="side-nav">
  <a href="alumniinfo.php">Home</a>
  <a href="alumni_update.php">Update Personal Profile</a>
  <a href="alumnilogin.php">Logout</a>
</div>
<form action="" method="POST">
		<label for="rollNo">Roll Number:</label><br>
		<input type="text" id="rollNo" name="rollNo"><br>
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password"><br>
		<label for="cpi">CPI:</label><br>
		<input type="text" id="cpi" name="cpi"><br>
		<label for="branch">Branch:</label><br>
		<input type="text" id="branch" name="branch"><br>
		<label for="dept">Department:</label><br>
		<input type="text" id="dept" name="dept"><br>
		<label for="year">Graduating Year:</label><br>
		<input type="number" id="year" name="year"><br>
        <label for="location">Present Location:</label><br>
		<input type="text" id="location" name="location"><br>
        <label for="area">Present Area:</label><br>
		<input type="text" placeholder="Business,IT,Management.."id="area" style="width: 150px;" name="area"><br>
        <label for="position">Present Position:</label><br>
		<input type="text" id="position" name="position"><br>
		<label for="placedIitp">Placed from IITP?:</label><br>
		<input type="radio" id="yes" name="placedIitp" value="yes">
		<label for="yes">Yes</label><br>
		<input type="radio" id="no" name="placedIitp" value="no">
		<label for="no">No</label><br>
        <input type="submit" id="submit"name="submit" value="Submit">
    </form>
    
    
</body>
</html>
<?php

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
if(isset($_POST['submit'])){
    // get the form data
$rollNo = $_POST['rollNo'];
$name = $_POST['name'];
$password = $_POST['password'];
$cpi = $_POST['cpi'];
$branch = $_POST['branch'];
$dept = $_POST['dept'];
$year = $_POST['year'];
$location = $_POST['location'];
$area = $_POST['area'];
$position = $_POST['position'];
$placedIitp = $_POST['placedIitp'];
// update the form data into the database
$sql = "UPDATE Alumni SET name='$name', password='$password', cpi='$cpi',  dept='$dept', branch='$branch',year='$year', location='$location',area='$area',position='$position',placedIitp='$placedIitp' WHERE rollNo='$rollNo';";
$result=mysqli_query($conn,$sql);
if ($result) {
    if($placedIitp == 'yes'){
        header("Location: alumni_update2.php"); 
    }
    else{
        header("Location: alumniinfo.php");
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
}
?>