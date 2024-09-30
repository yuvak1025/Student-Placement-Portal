<!DOCTYPE html>
<html>
<head>
<title>Companies Appeared in Certain Year</title>
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
		#company-names {
			font-size: 24px;
			font-weight: bold;
			margin-top: 10px;
			color: #00796b;
		}
	</style>
</head>
<body>
<h1>Companies Appeared in Certain Year</h1>
	<form method="post">
	<label for="year">Enter the year:</label>
		<input type="number" id="year" name="year">
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

// Retrieve the input value for the year from the user
if (isset($_POST['year'])) {
    $year = $_POST['year'];
} else {
    // Handle the case where the 'n' key does not exist
    $year = 0;
}


// Retrieve the number of companies and their names that appeared in the inputted year
$sql = "SELECT COUNT(*) AS num_companies, GROUP_CONCAT(company_name SEPARATOR ', ') AS company_names FROM Company WHERE recruiting_since <= $year";
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Number of companies that appeared in ".$year.": ".$row["num_companies"]."<br>";
        echo "<span id='company-names'>Company names: ".$row["company_names"]."</span>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>