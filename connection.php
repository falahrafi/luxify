<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luxify";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>