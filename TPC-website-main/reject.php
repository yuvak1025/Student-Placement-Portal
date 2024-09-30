<?php
session_start();

/* Check if rollNo and email are set in session
if (!isset($_SESSION['rollNo']) || !isset($_SESSION['email'])) {
    // Redirect to "studlogin" page
    header("Location: studlogin.php");
    exit;
} */

// Connect to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$rollNo = $_GET['id'];
$email = $_SESSION['email'];

// Check if form is submitted
if (isset($_POST['confirm'])) {
    // Delete application from applications table
    $sql = "DELETE FROM applications WHERE rollNo = '$rollNo' AND email = '$email'";
    mysqli_query($conn, $sql);
    // Redirect to "applications" page
    header("Location: applications.php");
    exit;
} elseif (isset($_POST['cancel'])) {
    // Redirect to "applications" page
    header("Location: applications.php");
    exit;
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reject Application</title>
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
        h2 {
            margin-left: 470px;
        }
        
        .logo {
            max-height: 100px;
            margin-right: 1500px;
        }
        
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        
        button {
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
            margin: 0 10px;
        }
        
        button:hover {
            background-color: #00796b;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <header>
        <img src="iit_patna_logo.png" alt="IIT Patna Logo" class="logo" width="60" height="60">
        <h1>Reject Application</h1>
    </header>
	<h2>Are you sure you want to reject this application?</h2>
	
	<form method="POST">
		<button type="submit" name="confirm">Confirm</button>
		<button type="submit" name="cancel">Cancel</button>
	</form>
</body>
</html>


<?php
mysqli_close($conn);
?>
