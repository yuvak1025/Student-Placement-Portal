<!DOCTYPE html>
<html>
<head>
	<title>View Companies</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}
        header {
		background-color: #003366;
		color: white;
		text-align: center;
		image-orientation: left;
		padding: 20px;
		display: flex;
		align-items: center;
		margin-top: -10px;
		margin-left: -10px;
		margin-right: -15px;
	}

	h1 {
		margin: 0;
		margin-left: -60px;
		flex: 1;
	}

	table {
		border-collapse: collapse;
		margin: 30px auto;
		width: 70%;
	}

	th,
	td {
		padding: 10px;
		border: 1px solid black;
		text-align: left;
	}

	.side-nav {
		height: 100%;
		width: 150px;
		position: fixed;
		top: 110px;
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

	button {
		background-color: #003366;
		color: white;
		padding: 10px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	button:hover {
		background-color: #004b8f;
	}
</style>

<?php
session_start();

if(!isset($_SESSION['rollNo'])) {
    header('Location: studlogin.php');
    exit();
}


// Connect to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rollNo = $_SESSION['rollNo'];

// Query to retrieve companies and their information
if ($result = mysqli_query($conn, "SELECT * FROM Company")) {

    // Display the company information in a table
    echo "<!DOCTYPE html>
            <html>
                <head>
                    <title>View Companies</title>
                    <style>
                        /* CSS styling */
                    </style>
                </head>
                <body>
                    <header>
                        <img src='iit_patna_logo.png' alt='logo' height='80px'>
                        <h1>View Companies</h1>
                    </header>
                    <div class='side-nav'>
                        <a href='studentinfo.php'>Home</a>
                        <a href='updateprofile.php'>Update Personal Profile</a>
                        <a href='viewcompanies.php'>View Companies</a>
						<a href='applied.php'>Applied</a>
                        <a href='studlogin.php'>Logout</a>
                    </div>
                    <table>
                        <tr>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Job Description</th>
                            <th>Role Offered</th>
                            
                            <th>Preferred Department</th>
                            <th>Essential Skills</th>
                            <th>Salary Package</th>
                            <th>Mode of Interview</th>
                            <th></th>
                        </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $salary_package = $row['salary_package'];
        
        // Query to retrieve the package and placement status of the student
        $query = "SELECT * FROM Students2 WHERE rollNo='$rollNo'";
        $result2 = mysqli_query($conn, $query);
        $row2 = mysqli_fetch_assoc($result2);
        //$package = $row2['package'];
		if (isset($row2['placementStatus'])) {
			$package = $row2['package'];
		}
		$min_qualification = $company['minimum_qualification'] ?? 'Not specified';
		
		if (isset($row2['placementStatus'])) {
			$placementStatus = $row2['placementStatus'];
		}
        
		
        
        // Display the company information only if salary_package is greater than package or placementStatus is not placed
        
            echo "<tr>
                    <td>{$row['company_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['job_description']}</td>
                    <td>{$row['role_offered']}</td>
                    
                    <td>{$row['preferred_department']}</td>
                    <td>{$row['essential_skills']}</td>
                    <td>{$row['salary_package']}</td>
                    <td>{$row['mode_of_interview']}</td>
                    <td><a href='apply.php?email=$email'>Apply</a></td>
                </tr>";
        
    }
    echo "</table>
            </body>
        </html>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

