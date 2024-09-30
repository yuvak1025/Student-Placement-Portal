<!DOCTYPE html>
<html>
<head>
    <title>Update Personal profile</title>
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
	</style>
</head>
<body>
<header>
        <img src="iit_patna_logo.png" alt="IIT Patna Logo" class="logo" width=60px height=60px>
		<centre>
	<h1>Update Personal Profile</h1>
    </centre>
    </header>
    <form action="" method="POST">
        <label for="rollNo">Roll Number:</label><br>
        <input type="text" id="rollNo" name="rollNo"><br>
        <label for="companyName">Company Name:</label><br>
        <input type="text" id="companyName" name="companyName"><br>
        <label for="role">Role in Company:</label><br>
        <input type="text" placeholder="SDE,Data Scientist..." id="role" name="role"><br>
        <label for="package">Package(CTC):</label><br>
        <input type="number" id="package" name="package"><br>
        <label for="year">Year of Joining in Company:</label><br>
        <input type="number" id="year" name="year"><br><br>
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
$companyName = $_POST['companyName'];
$role = $_POST['role'];
$package = $_POST['package'];
$year = $_POST['year'];

$qury= "SELECT * FROM Students2 WHERE rollNo = '$rollNo'";
$result1=mysqli_query($conn,$qury);
$num_rows = mysqli_num_rows($result1);
if($num_rows>0)
{
// update the form data into the database
$sql = "UPDATE Students2 SET companyName='$companyName', role='$role', package='$package', year='$year' WHERE rollNo='$rollNo';";

$result=mysqli_query($conn,$sql);
if ($result) {
    header("Location: studentinfo.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else if($num_rows==0)
{
// update the form data into the database
$sql = "INSERT into Students2 (rollNo, companyName,role,package,year) values('$rollNo','$companyName', '$role', '$package', '$year' );";

$result=mysqli_query($conn,$sql);
if ($result) {
    header("Location: studentinfo.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
}
?>
