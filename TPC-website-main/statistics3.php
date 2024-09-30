<!DOCTYPE html>
<html>
<head>
    <title>Salary Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Salary Bar Graph</h1>
    <canvas id="myChart"></canvas>

    <?php
    // Database connection details
    $servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get average salary for each year
    $sql = "SELECT year, AVG(package) AS avg_salary FROM Alumni2 WHERE year BETWEEN 2012 AND 2023 GROUP BY year";

    // Execute query and get results
    $result = mysqli_query($conn, $sql);

    // Prepare data for bar graph
    $labels = array();
    $data = array();

    while($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['year'];
        $data[] = $row['avg_salary'];
    }

    // Close database connection
    mysqli_close($conn);

    // Display bar graph using Chart.js library
    echo "<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: " . json_encode($labels) . ",
            datasets: [{
                label: 'Average Salary',
                data: " . json_encode($data) . ",
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>";
    ?>
</body>
</html>
