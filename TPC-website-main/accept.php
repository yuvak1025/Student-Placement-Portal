<!DOCTYPE html>
<html>
<head>
	<title>Accept Page</title>
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
		margin-top: -50px;
	}
	
	.logo {
		max-height: 100px;
		margin-right: 1500px;
	}
	
	form {
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-top: 50px;
	}
	
	label {
       margin-bottom: 10px;
       font-family: Arial, sans-serif;
    }

	
	input[type=number] {
		padding: 10px;
		border-radius: 5px;
		border: none;
		box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
		margin-bottom: 20px;
		font-size: 16px;
	}
	
	button[type=submit] {
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
	}
	
	button[type=submit]:hover {
		background-color: #00796b;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
	}
	
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
<header>
	<img src="iit_patna_logo.png" alt="IIT Patna Logo" class="logo" width=60px height=60px>
		<center>
		<h1>Accept page</h1>
		</center>
	</header>
	<form method="POST">
		<label for="year">Recruiting Year:</label>
		<input type="number" id="year" name="year" required>
		<button type="submit">Submit</button>
	</form>
</body>
</html>

<?php
// start session
session_start();
// retrieve rollNo and email from previous page
$rollNo = $_GET['id'];
$email = $_SESSION['email'];

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['year'])){
    $year = $_POST['year'];
// check placement status in Students table
$sql = "SELECT placementStatus FROM Students WHERE rollNo='$rollNo'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $placementStatus = $row['placementStatus'];
    // if placement status is placed, update Students2 table
    if ($placementStatus == "placed") {
        // retrieve company info from Company table
        $sql = "SELECT company_name, role_offered, salary_package FROM Company WHERE email='$email'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            $row = $result2->fetch_assoc();
            $companyName = $row['company_name'];
            $role = $row['role_offered'];
            $package = $row['salary_package'];
            
            // prompt user for year and update Students2 table
            $sql1="SELECT package FROM Students2 where rollNo='$rollNo'";
            $result3 = $conn->query($sql);
            $row = $result2->fetch_assoc();
			$studsal = 0; // or any other default value you want

            if (!empty($row) && array_key_exists('package', $row)) {
				$studsal = $row['package'];
			}
			
            if($studsal<$package){
                echo"<script>alert('Student already being placed!')</script>";
            }
            else{
            $sql = "UPDATE Students2 SET companyName='$companyName', role='$role', package='$package', year='$year' WHERE rollNo='$rollNo'";
            $resu=$conn->query($sql);
            $sql="DELETE from applications where rollNo='$rollNo' and email='$email'";
            $resu=$conn->query($sql);
            header("Location: applications.php");
            }
        } else {
            echo "Company info not found";
        }
    } else {
        // retrieve company info from Company table
        $sql = "SELECT company_name, role_offered, salary_package FROM Company WHERE email='$email'";
        $result2= $conn->query($sql);
        if ($result2->num_rows > 0) {
            $row = $result2->fetch_assoc();
            $companyName = $row['company_name'];
            $role = $row['role_offered'];
            $package = $row['salary_package'];
            
            // prompt user for year and insert new row into Students2 table
            
            $sql1="update Students set placementStatus='placed' where rollNo='$rollNo'";
            if ($conn->query($sql1) == TRUE) {
                echo "Record Updated successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
            $sql = "INSERT INTO Students2 (rollNo, companyName, role, package, year) VALUES ('$rollNo', '$companyName', '$role', '$package', '$year')";
            if ($conn->query($sql) == TRUE) {
                $sql="DELETE from applications where rollNo='$rollNo' and email='$email'";
                $resu=$conn->query($sql);
                header("Location: applications.php");
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Company info not found";
        }
    }
} else {
    echo "Student not found";
}
}
// close database connection
$conn->close();
?>

