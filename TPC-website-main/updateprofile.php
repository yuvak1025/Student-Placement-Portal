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
  <a href="studentinfo.php">Home</a>
  <a href="updateprofile.php">Update Personal Profile</a>
  <a href="viewcompanies.php">View Companies</a>
  <a href="applied.php">Applied</a>
  <a href="studlogin.php">Logout</a>
</div>

    <form action="" method="POST">
        <label for="rollNo">Roll Number:</label><br>
        <input type="text" id="rollNo" name="rollNo"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="marks">Marks:</label><br>
        <input type="text" id="marks" name="marks"><br>
        <label for="cpi">CPI:</label><br>
        <input type="text" id="cpi" name="cpi"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age"><br>
        <label for="branch">Branch:</label><br>
        <input type="text" id="branch" name="branch"><br>
        <label for="dept">Department:</label><br>
        <input type="text" id="dept" name="dept"><br>
        <label for="areaOfIntrest">Area of Interest:</label><br>
        <input type="text" id="areaOfIntrest" name="areaOfIntrest"><br>
        <label for="year">Year:</label><br>
        <input type="text" id="year" name="year"><br>
        <label for="placementStatus">Placement Status:</label><br>
        <input type="radio" id="placed" name="placementStatus" value="placed">
        <label for="placed">Placed</label><br>
        <input type="radio" id="not_placed" name="placementStatus" value="not placed">
        <label for="not_placed">Not Placed</label><br><br>
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
    die("Connection failed: " .mysqli_connect_error());
}
if(isset($_POST['submit'])){


// get the form data
$rollNo = $_POST['rollNo'];
$name = $_POST['name'];
$password = $_POST['password'];
$marks = $_POST['marks'];
$cpi = $_POST['cpi'];
$age = $_POST['age'];
$branch = $_POST['branch'];
$dept = $_POST['dept'];
$areaOfIntrest = $_POST['areaOfIntrest'];
$year = $_POST['year'];
$placementStatus = $_POST['placementStatus'];


// update the form data into the database
$sql = "UPDATE Students SET name='$name', password='$password', marks='$marks', cpi='$cpi', age='$age', branch='$branch', dept='$dept', areaOfIntrest='$areaOfIntrest', year='$year', placementStatus='$placementStatus' WHERE rollNo='$rollNo';";

$result=mysqli_query($conn,$sql);
if ($result) {
    if($placementStatus == 'placed'){
        header("Location: updateprofile2.php"); 
    }
    else{
        header("Location: studentinfo.php");
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
}
?>




