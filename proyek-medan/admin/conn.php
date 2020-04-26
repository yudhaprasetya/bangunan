<?php
$servername = "sql211.epizy.com";
$username = "epiz_24182043";
$password = "DnO5yH8ywWBBxD";
$dbname = "epiz_24182043_proyek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (! $conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>
