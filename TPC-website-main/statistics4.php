<?php
// Connect to MySQL database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from Alumni2 table
$sql = "SELECT year AS year, COUNT(DISTINCT CompanyName) AS count FROM Alumni2 GROUP BY year";
$result = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['year']] = $row['count'];
}

// Create HTML table for bar graph
echo "<table>";
echo "<tr><th>Year</th><th>Companies Recruited</th></tr>";
$max_value = max($data);
foreach ($data as $year => $count) {
    $percent = $count / $max_value * 100;
    echo "<tr><td>$year</td><td><div style=\"background-color: blue; width: $percent%;\">$count</div></td></tr>";
}
echo "</table>";

// Close MySQL database connection
mysqli_close($conn);
?>