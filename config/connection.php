<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="qlsv";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname,8080);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>