<?php
$host = "localhost";
$user = "root";       // change if your MySQL username is different
$pass = "";           // change if you have a MySQL password
$db = "gce_portal";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
