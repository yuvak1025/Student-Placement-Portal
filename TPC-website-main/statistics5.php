<!DOCTYPE html>
<html>
<head>
  <title>Branch-wise Average Salaries</title>
  <style>
    h1 {
      text-align: center;
      font-size: 36px;
      margin-top: 50px;
    }

    form {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    label {
      font-size: 24px;
      margin-right: 10px;
    }

    input[type="text"] {
      font-size: 24px;
      padding: 5px;
    }

    button[type="submit"] {
      font-size: 24px;
      padding: 5px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <h1>Branch-wise Average Salaries</h1>
  <form method="post" >
    <label for="year">Enter Year:</label>
    <input type="text" name="year" id="year">
    <button type="submit">Submit</button>
  </form>
</body>
</html>

<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the year from user input
if (isset($_POST['year'])) {
  $year = $_POST['year'];
} else {
  // Handle the case where the 'n' key does not exist
  $year = 0;
}


// Get the roll numbers and packages for the given year
$sql = "SELECT rollNo, package FROM Alumni2 WHERE year='$year'";
$result = mysqli_query($conn, $sql);

// Initialize an empty array to hold branch-wise packages
$branchPackages = array();

// Loop through each row of the result set
while ($row = mysqli_fetch_assoc($result)) {
  // Get the branch for the current roll number
  $rollNo = $row['rollNo'];
  $sql2 = "SELECT branch FROM Alumni WHERE rollNo='$rollNo'";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $branch = $row2['branch'];

  // Add the package to the branch-wise packages array
  if (isset($branchPackages[$branch])) {
    $branchPackages[$branch][] = $row['package'];
  } else {
    $branchPackages[$branch] = array($row['package']);
  }
}

// Calculate the average package for each branch
$branchAverages = array();
foreach ($branchPackages as $branch => $packages) {
  $average = array_sum($packages) / count($packages);
  $branchAverages[$branch] = $average;
}

// Display the branch-wise averages
echo "<h2>Branch-wise Average Salaries for $year</h2>";
foreach ($branchAverages as $branch => $average) {
  echo "<p>$branch: $average</p>";
}

// Close the database connection
mysqli_close($conn);
?>
