<!DOCTYPE html>
<html>
<head>
	<title>Top Companies by Salary Package</title>
	<style>
		h1 {
			text-align: center;
			font-size: 36px;
			color: #003366;
			margin-top: 20px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 30px;
			font-size: 20px;
			font-weight: bold;
			color: #003366;
		}
		label {
			margin-bottom: 10px;
		}
		input[type=number] {
    padding: 10px;
    font-size: 18px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    text-align: center;
    box-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}
		input[type=submit] {
			background-color: #003366;
			color: white;
			padding: 10px 20px;
			font-size: 18px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 30px;
		}
		th, td {
			text-align: left;
			padding: 8px;
		}
		th {
			background-color: #00796b;
			color: white;
		}
		tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<h1>Top Companies by Salary Package</h1>
	<form method="post">
		<label for="n">Enter the number of top companies to display:</label>
		<input type="number" id="n" name="n" min="1" required>
		<input type="submit" value="Submit">
	</form>
	<div id="results">
		<!-- The PHP code will be displayed here -->
        <?php
// MySQL database connection settings
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the input value for 'n' from the user
if (isset($_POST['n'])) {
    $n = $_POST['n'];
} else {
    // Handle the case where the 'n' key does not exist
    $n = 0;
}


// Prepare the SQL statement
$stmt = $conn->prepare("SELECT company_name, salary_package FROM Company ORDER BY salary_package DESC LIMIT ?");

// Bind the parameter
$stmt->bind_param("i", $n);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();


// Display the results
if ($result->num_rows > 0) {
    echo "<table><tr><th>Company Name</th><th>Salary Package</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["company_name"]."</td><td>".$row["salary_package"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>

	</div>
</body>
</html>
