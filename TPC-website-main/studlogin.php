<?php
    session_start();

    $msg = "";
    if(isset($_POST['login'])) {
        $dbhost = "localhost:3307";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "miniproject";
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if(!$conn ) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        $rollNo = $_POST['rollNo'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Students WHERE rollNo = '$rollNo' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $_SESSION['rollNo'] = $rollNo;
            header("location: studentinfo.php");
        }
        else {
            $msg = "Invalid credentials";
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<style>
		header {
			background-color: #003366;
			color: #ffffff;
			padding: 10px;
            margin-top:-10px;
            margin-left:-10px;
            margin-right:-10px;
			text-align: center;
			display: flex;
			align-items: center;
		}
		h1 {
			margin-left: 470px;
			font-size: 36px;
			font-weight: bold;
            margin-top: 0;
			margin-bottom: 0;
		}
		h2 {
			margin-top: 30px;
			text-align: center;
		}
        img {
			height: 80px;
			margin-right: 20px;
		}
		form {
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<img src="iit_patna_logo.png" alt="IIT Patna Logo">
		<h1>Student Login</h1>
	</header>
	<h2>Please enter your login credentials:</h2>
	<form method="post">
		<label for="rollNo">Roll Number:</label>
		<input type="text" id="rollNo" name="rollNo"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<button type="submit" name="login">Login</button>
		<p>New user? <a href="register.php">Register</a></p>
	</form>
	<p><?php echo $msg ?></p>
	
</body>
</html>