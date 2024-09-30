<?php
//Since port has been changed on XAMPP, change MySQL server connections.
$servername = "localhost:3307";
$username = "root";
$password = "";
$database="miniproject";


$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}
