<!DOCTYPE html>
<html>
<head>
    <title>Alumni Information</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #003366;
            color: white;
            text-align: center;
            
            padding: 20px;
            display: flex;
            align-items: center;
        }

        h1 {
            margin: 0;
            margin-left: 450px;
            flex: 1;
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
        <h1>Alumni Information</h1>
        </centre>
    </header>
    <div class="side-nav">
        <a href="alumniinfo.php">Home</a>
        <a href="alumni_update.php">Update Personal Profile</a>
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

    <?php
    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['rollNo'])) {
        header("Location: alumnilogin.php");
        exit();
    }

    // Connect to the database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "miniproject";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $rollNo = $_SESSION['rollNo'];

    // Retrieve the alumni information from the database
    $rollNo = $_SESSION['rollNo'];
    $sql = "SELECT a.rollNo, a.name, a.branch, a.dept, a.year, a2.companyName, a2.role, a2.package 
            FROM Alumni a 
            LEFT JOIN Alumni2 a2 ON a.rollNo = a2.rollNo 
            WHERE a.rollNo = '$rollNo'";

    $result = mysqli_query($conn, $sql);

    // Display the information in a table
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    echo "<table>
          <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Dept</th>
            <th>Year</th>
            <th>Company Name</th>
            <th>Role</th>
            <th>Package</th>
          </tr>
          <tr>
            <td>{$row['rollNo']}</td>
            <td>{$row['name']}</td>
            <td>{$row['branch']}</td>
            <td>{$row['dept']}</td>
            <td>{$row['year']}</td>
            <td>{$row['companyName']}</td>
            <td>{$row['role']}</td>
            <td>{$row['package']}</td>
          </tr>
        </table>";
} else {
    echo "No alumni information found.";
}
?>

</head>
<body>
	
	<div class="side-nav">
  <a href="alumniinfo.php">Home</a>
  <a href="alumni_update.php">Update Personal Profile</a>
  <a href="alumnilogin.php">Logout</a>
</div>
</body>
</html>
<?php

mysqli_close($conn);
?>
